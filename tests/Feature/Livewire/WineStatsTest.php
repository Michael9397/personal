<?php

use Livewire\Volt\Volt;
use App\Models\User;
use App\Models\Wine;

beforeEach(function () {
    \Artisan::call('migrate:fresh');
});

it('correctly adds up red and white wines', function() {
    Wine::factory()->count(1)->create(['color' => 'red', 'liked_it' => 0]);
    Wine::factory()->count(2)->create(['color' => 'red', 'liked_it' => 1]);
    Wine::factory()->count(3)->create(['color' => 'white', 'liked_it' => 0]);
    Wine::factory()->count(4)->create(['color' => 'white', 'liked_it' => 1]);
    $response = $this->get('/wine');

    $response->assertSee('2/3');
    $response->assertSee('4/7');
});
