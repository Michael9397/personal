<?php

use App\Models\User;
use App\Models\Wine;
use Livewire\Volt\Volt;
use Tests\Feature\Helpers\WineHelpers;

beforeEach(function () {
    \Artisan::call('migrate:fresh');
});

it('can render', function () {
    $component = Volt::test('wineform');

    $component->assertSee('');
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

it('creates a form and saves to the database', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $formData = WineHelpers::getBasicWineFormArray();

    Livewire::test('wineform')
            ->set('form.name', $formData['name'])
            ->set('form.color', $formData['color'])
            ->set('form.type', $formData['type'])
            ->set('form.from', $formData['from'])
            ->set('form.liked_it', $formData['liked_it'])
            ->set('form.notes', $formData['notes'])
            ->set('form.time_tried', $formData['time_tried'])
            ->call('save');

    $this->assertDatabaseHas('wines', $formData);
});

it('edits a form and saves to the database', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $wine = Wine::factory()->create([
        'name' => 'Old Wine Name',
        'color' => 'white',
        'type' => 'Savignon Blanc',
        'from' => 'Germany',
        'liked_it' => 0,
        'notes' => 'This is an old note',
        'time_tried' => '2022-02-02',
    ]);

    $formData = WineHelpers::getBasicWineFormArray();

    Livewire::test('wineform', ['wine' => $wine])
            ->set('form.name', $formData['name'])
            ->set('form.color', $formData['color'])
            ->set('form.type', $formData['type'])
            ->set('form.from', $formData['from'])
            ->set('form.liked_it', $formData['liked_it'])
            ->set('form.notes', $formData['notes'])
            ->set('form.time_tried', $formData['time_tried'])
            ->call('save');

    $this->assertDatabaseHas('wines', $formData);
});
