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

        Troop::updateOrCreate(
            ['name' => 'Legionnaire'],
            [
                'lumber' => 120,
                'clay' => 100,
                'iron' => 150,
                'crop' => 30,
                'train_time' => 66,
                'tribe' => 'Romans',
                'upkeep' => 1,
                'speed' => 12
            ]
        );

        Troop::updateOrCreate(
            ['name' => 'Praetorian'],
            [
                'lumber' => 100,
                'clay' => 130,
                'iron' => 160,
                'crop' => 70,
                'train_time' => 73,
                'tribe' => 'Romans',
                'upkeep' => 1,
                'speed' => 10
            ]
        );

        Troop::updateOrCreate(
            ['name' => 'Imperian'],
            [
                'lumber' => 150,
                'clay' => 160,
                'iron' => 210,
                'crop' => 80,
                'train_time' => 80,
                'tribe' => 'Romans',
                'upkeep' => 1,
                'speed' => 14
            ]
        );

        Troop::updateOrCreate(
            ['name' => 'Equites Imperatoris'],
            [
                'lumber' => 550,
                'clay' => 440,
                'iron' => 320,
                'crop' => 100,
                'train_time' => 79,
                'tribe' => 'Romans',
                'upkeep' => 3,
                'speed' => 28
            ]
        );
        
        Troop::updateOrCreate(
            ['name' => 'Equites Caesaris'],
            [
                'lumber' => 550,
                'clay' => 640,
                'iron' => 800,
                'crop' => 180,
                'train_time' => 130,
                'tribe' => 'Romans',
                'upkeep' => 4,
                'speed' => 20
            ]
        );

        Troop::updateOrCreate(
            ['name' => 'Phalanx'],
            [
                'lumber' => 100,
                'clay' => 130,
                'iron' => 55,
                'crop' => 30,
                'train_time' => 40,
                'tribe' => 'Gauls',
                'upkeep' => 1,
                'speed' => 14
            ]
        );
        
        Troop::updateOrCreate(
            ['name' => 'Swordsman'],
            [
                'lumber' => 140,
                'clay' => 150,
                'iron' => 185,
                'crop' => 60,
                'train_time' => 67,
                'tribe' => 'Gauls',
                'upkeep' => 1,
                'speed' => 12
            ]
        );
        
        Troop::updateOrCreate(
            ['name' => 'Pathfinder'],
            [
                'lumber' => 170,
                'clay' => 150,
                'iron' => 20,
                'crop' => 40,
                'train_time' => 60,
                'tribe' => 'Gauls',
                'upkeep' => 2,
                'speed' => 34
            ]
        );
        
        Troop::updateOrCreate(
            ['name' => 'Theutates Thunder'],
            [
                'lumber' => 350,
                'clay' => 450,
                'iron' => 230,
                'crop' => 60,
                'train_time' => 111,
                'tribe' => 'Gauls',
                'upkeep' => 2,
                'speed' => 38
            ]
        );
        
        Troop::updateOrCreate(
            ['name' => 'Druidrider'],
            [
                'lumber' => 360,
                'clay' => 330,
                'iron' => 280,
                'crop' => 120,
                'train_time' => 134,
                'tribe' => 'Gauls',
                'upkeep' => 2,
                'speed' => 32
            ]
        );
        
        Troop::updateOrCreate(
            ['name' => 'Haeduan'],
            [
                'lumber' => 500,
                'clay' => 620,
                'iron' => 675,
                'crop' => 170,
                'train_time' => 145,
                'tribe' => 'Gauls',
                'upkeep' => 3,
                'speed' => 28
            ]
        );
        
        Troop::updateOrCreate(
            ['name' => 'Clubswinger'],
            [
                'lumber' => 95,
                'clay' => 75,
                'iron' => 40,
                'crop' => 40,
                'train_time' => 27,
                'tribe' => 'Teutons',
                'upkeep' => 1,
                'speed' => 14
            ]
        );
        
        Troop::updateOrCreate(
            ['name' => 'Spearman'],
            [
                'lumber' => 145,
                'clay' => 70,
                'iron' => 85,
                'crop' => 40,
                'train_time' => 41,
                'tribe' => 'Teutons',
                'upkeep' => 1,
                'speed' => 14
            ]
        );
        
        Troop::updateOrCreate(
            ['name' => 'Axeman'],
            [
                'lumber' => 130,
                'clay' => 120,
                'iron' => 170,
                'crop' => 70,
                'train_time' => 44,
                'tribe' => 'Teutons',
                'upkeep' => 1,
                'speed' => 14
            ]
        );
        
        Troop::updateOrCreate(
            ['name' => 'Scout'],
            [
                'lumber' => 160,
                'clay' => 100,
                'iron' => 50,
                'crop' => 50,
                'train_time' => 41,
                'tribe' => 'Teutons',
                'upkeep' => 1,
                'speed' => 14
            ]
        );
        
        Troop::updateOrCreate(
            ['name' => 'Paladin'],
            [
                'lumber' => 370,
                'clay' => 270,
                'iron' => 290,
                'crop' => 94,
                'train_time' => 88,
                'tribe' => 'Teutons',
                'upkeep' => 1,
                'speed' => 14
            ]
        );
        
        Troop::updateOrCreate(
            ['name' => 'Teutonic Knight'],
            [
                'lumber' => 450,
                'clay' => 515,
                'iron' => 480,
                'crop' => 80,
                'train_time' => 109,
                'tribe' => 'Teutons',
                'upkeep' => 3,
                'speed' => 18
            ]
        );
    }
}
