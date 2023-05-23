<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estado::create(['nombre' => 'REGISTRADO', 'descripcion' => 'Proyecto ingresamos al sistema', 'estado' => '1']);
        Estado::create(['nombre' => 'EN PROCESO', 'descripcion' => 'Proyectos que ya están siendo gestionados', 'estado' => '1']);
        Estado::create(['nombre' => 'TERMINADO', 'descripcion' => 'Proyectos concluidos', 'estado' => '1']);
    }
}
