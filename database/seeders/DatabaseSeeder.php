<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Troop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Troop::create([
            'name' => 'Legionnaire',
            'lumber' => 120,
            'clay' => 100,
            'iron' => 150,
            'crop' => 30,
            'train_time' => 66,
            'tribe' => 'Romans',
            'upkeep' => 1,
            'speed' => 12
        ]);
        Troop::create([
            'name' => 'Praetorian',
            'lumber' => 100,
            'clay' => 130,
            'iron' => 160,
            'crop' => 70,
            'train_time' => 73,
            'tribe' => 'Romans',
            'upkeep' => 1,
            'speed' => 10
        ]);
        Troop::create([
            'name' => 'Imperian',
            'lumber' => 150,
            'clay' => 160,
            'iron' => 210,
            'crop' => 80,
            'train_time' => 80,
            'tribe' => 'Romans',
            'upkeep' => 1,
            'speed' => 14
        ]);
        Troop::create([
            'name' => 'Equites Imperatoris',
            'lumber' => 550,
            'clay' => 440,
            'iron' => 320,
            'crop' => 100,
            'train_time' => 79,
            'tribe' => 'Romans',
            'upkeep' => 2,
            'speed' => 28
        ]);
    }
}
