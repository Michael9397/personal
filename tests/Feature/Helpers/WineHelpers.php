<?php


namespace Tests\Feature\Helpers;


class WineHelpers
{
    public static function getBasicWineFormArray(): array
    {
        return [
            'name' => 'Test Wine',
            'color' => 'red',
            'type' => 'Merlot',
            'from' => 'France',
            'liked_it' => 1,
            'notes' => 'This is a test note',
            'time_tried' => '2021-01-01',
        ];
    }

}
