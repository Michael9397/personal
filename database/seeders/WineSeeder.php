<?php

namespace Database\Seeders;

use Database\Factories\WineFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(WineFactory::class)->count(10)->create();
    }
}
