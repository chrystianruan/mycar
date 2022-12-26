<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\User::factory(10)->create();

       $modelos = array(
            array(
                'name' => 'Siena',
                'mark_id' => 1
            ),
            array(
                'name' => 'Uno',
                'mark_id' => 1
            ), 
            array(
                'name' => 'Toro',
                'mark_id' => 1
            ), 
            array(
                'name' => 'Camaro',
                'mark_id' => 2
            ), 
            array(
                'name' => 'Cobalt',
                'mark_id' => 2
            ), 
            array(
                'name' => 'Vectra',
                'mark_id' => 2
            ), 
            array(
                'name' => 'Gol',
                'mark_id' => 3
            ), 
            array(
                'name' => 'Passat',
                'mark_id' => 3
            ), 
            array(
                'name' => 'Jetta',
                'mark_id' => 3
            ), 
            array(
                'name' => 'CG Titan 160',
                'mark_id' => 4
            ), 
            array(
                'name' => 'CG Fan 150',
                'mark_id' => 4
            ), 
            array(
                'name' => 'Hornet',
                'mark_id' => 4
            ), 
            array(
                'name' => 'XJ6',
                'mark_id' => 5
            ), 
            array(
                'name' => 'Factor 150',
                'mark_id' => 5
            ), 
            array(
                'name' => 'Fazer 250',
                'mark_id' => 5
            ), 
        );

       $marks = ['Fiat', 'Chevrolet', 'Volkswagen', 'Honda Motos', 'Yamaha'];
       
       for ($i = 0; $i < count($marks); $i++) { 
            \App\Models\Mark::factory()->create([
                'name' => "".$marks[$i],
            ]);
        }

        foreach($modelos as $model => $item) {
            \App\Models\Modelo::factory()->create([
                'name' => "".$item["name"],
                'mark_id' => "".$item["mark_id"]
            ]);
        }

       
    }
}
