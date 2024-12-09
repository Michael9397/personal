<?php

use App\Models\Wine;

beforeEach(function () {
    \Artisan::call('migrate:fresh');
});

it('can load the base page', function () {
    $response = $this->get('/wine');

    $response->assertStatus(200);
});

it('has the empty wine list message when no data is present', function () {
    $response = $this->get('/wine');

    $response->assertSee('No wines found');
});

it('cannot see the add wine button or the edit links when not logged in', function () {
    $response = $this->get('/wine');

    $response->assertDontSee('Add Wine');
});

it('cannot access the add wine page when not logged in', function () {
    $response = $this->get('/wine/create');

    $response->assertStatus(302);
});

it('cannot access the edit wine page when not logged in', function () {
    Wine::factory()->create();
    $response = $this->get('/wine/1/edit');

    $response->assertStatus(302);
});

it('can access an edit page when logged in as the wine admins ', function () {
    $user = \App\Models\User::factory()->create();
    $user2 = \App\Models\User::factory()->create();
    Wine::factory()->create();

    $response = $this->actingAs($user)->get('/wine/1/edit');
    $response2 = $this->actingAs($user2)->get('/wine/1/edit');


    $response->assertStatus(200);
    $response2->assertStatus(200);
});

it('can see the add wine button when logged in as user 1 or 2', function () {
    $user = \App\Models\User::factory()->create();
    $user2 = \App\Models\User::factory()->create();
    $response = $this->actingAs($user)->get('/wine');
    $response2 = $this->actingAs($user2)->get('/wine');

    $response->assertSee('Add Wine');
    $response2->assertSee('Add Wine');
});

it('cannot see the add wine button or the edit links when logged in as user 3', function () {
    \App\Models\User::factory()->count(2)->create();
    $user = \App\Models\User::factory()->create();
    $response = $this->actingAs($user)->get('/wine');

    $response->assertDontSee('Add Wine');
});

it('correctly adds up red and white wines', function() {
    Wine::factory()->count(1)->create(['type' => 'red', 'liked_it' => 0]);
    Wine::factory()->count(2)->create(['type' => 'red', 'liked_it' => 1]);
    Wine::factory()->count(3)->create(['type' => 'white', 'liked_it' => 0]);
    Wine::factory()->count(4)->create(['type' => 'white', 'liked_it' => 1]);
    $response = $this->get('/wine');

    $response->assertSee('2/3');
    $response->assertSee('4/7');
});

