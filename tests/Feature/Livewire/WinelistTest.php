<?php

use Carbon\Carbon;
use Livewire\Volt\Volt;
use App\Models\User;
use App\Models\Wine;
use Tests\Feature\Helpers\WineHelpers;

beforeEach(function () {
    \Artisan::call('migrate:fresh');
});

it('can render', function () {
    $component = Volt::test('winelist');

    $component->assertSee('All Wines');
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


it('shows the elements of wine on the table', function() {
    $user = User::factory()->create();
    $this->actingAs($user);

    $formData = WineHelpers::getBasicWineFormArray();
    Wine::factory()->count(1)->create($formData);
    $response = $this->get('/wine');

    foreach ($formData as $key => $value) {
        if ($key == 'time_tried') {
            $value = Carbon::parse($value)->format('F j, Y');
        }
        $response->assertSee($value);
    }
});
