<?php

use Illuminate\Database\Seeder;
use App\Models\Sala;

class SalasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sala::create([
            'descricao' => 'Lab. Informática I',
            'localizacao' => 'C07',
            'capacidade' => '25',
            ]);
        Sala::create([
            'descricao' => 'Lab. Informática II',
            'localizacao' => 'C12',
            'capacidade' => '30',
            ]);
        Sala::create([
            'descricao' => 'Lab. Informática III',
            'localizacao' => 'C13',
            'capacidade' => '20',
            ]);
    }
}
