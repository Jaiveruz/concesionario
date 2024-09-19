<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehiculo;

class VehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehiculo::create([ 'marca' => 'chevrolet', 'modelo' => 'camaro', 'ano' => '2020', 'color' => 'negro', 'kilometraje' => '1000', 'precio' => 10000 ]);
        Vehiculo::create([ 'marca' => 'ford', 'modelo' => 'mustang', 'ano' => '2019', 'color' => 'azul', 'kilometraje' => '0', 'precio' => 3000 ]);
        Vehiculo::create([ 'marca' => 'toyota', 'modelo' => '4runner', 'ano' => '2022', 'color' => 'rojo', 'kilometraje' => '2000', 'precio' => 1000 ]);
        Vehiculo::create([ 'marca' => 'ford', 'modelo' => 'eco sport', 'ano' => '2021', 'color' => 'gris', 'kilometraje' => '150000', 'precio' => 1000 ]);
    }
}
