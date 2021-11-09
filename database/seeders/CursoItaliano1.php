<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoItaliano1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            'materia' => 'Italiano 1',
            'horas' => '30',
            'tareas' => '5',
            'costo' => '60.00',
            'video' => 'https://www.youtube.com/embed/urqhsgBpyVM',
            'imagen' => 'https://cdn.pixabay.com/photo/2021/08/03/11/48/canal-6519196_960_720.jpg',
            ]);
    }
}
