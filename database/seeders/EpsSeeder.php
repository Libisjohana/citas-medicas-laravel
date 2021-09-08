<?php

namespace Database\Seeders;

use App\Models\Eps;
use Illuminate\Database\Seeder;

class EpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eps::create([
            'nombre'=>'Mutual ser',
            'descripcion'=>'Descripcion de prueba'
        ]);
        Eps::create([
            'nombre'=>'Salud Total',
            'descripcion'=>'Descripcion de prueba'
        ]);
        Eps::create([
            'nombre'=>'Cafesalud ',
            'descripcion'=>'Descripcion de prueba'
        ]);
        Eps::create([
            'nombre'=>'MCoomeva E.P.S.',
            'descripcion'=>'Descripcion de prueba'
        ]);
        Eps::create([
            'nombre'=>'SALUDVIDA',
            'descripcion'=>'Descripcion de prueba'
        ]);
    }
}
