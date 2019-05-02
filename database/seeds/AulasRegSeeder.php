<?php

use Illuminate\Database\Seeder;
use App\Models\Aulareg;

class AulasRegSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aulareg::create([
            'id_sala' => '1',
            'id_periodo' => '1',
            'id_responsavel' => '197',
            'dia' => '2',
            'inicio' => '08:00:00',
            'fim' => '09:30:00',
            'descricao' => 'Informática Básica',
        ]);
        Aulareg::create([
            'id_sala' => '1',
            'id_periodo' => '1',
            'id_responsavel' => '197',
            'dia' => '2',
            'inicio' => '10:00:00',
            'fim' => '11:30:00',
            'descricao' => 'Informática Básica II',
        ]);
        Aulareg::create([
            'id_sala' => '1',
            'id_periodo' => '1',
            'id_responsavel' => '197',
            'dia' => '3',
            'inicio' => '08:00:00',
            'fim' => '09:30:00',
            'descricao' => 'Informática Básica III',
        ]);
    }
}
