<?php

use Illuminate\Database\Seeder;
use App\pais_libro;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pais_libro::create([
        	'nombre_pais' => 'Guatemala'
        ]);

       	pais_libro::create([
       		'nombre_pais' => 'Mexico'
       	]);

       	pais_libro::create([
       		'nombre_pais' => 'España'
       	]);

       	pais_libro::create([
       		'nombre_pais' => 'Chile'
       	]);

       	pais_libro::create([
       		'nombre_pais' => 'Japon'
       	]);

       	pais_libro::create([
       		'nombre_pais' => 'Estados Unidos'
       	]);
    }
}
