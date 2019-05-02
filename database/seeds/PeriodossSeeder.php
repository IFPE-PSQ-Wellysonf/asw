<?php

use Illuminate\Database\Seeder;
use App\Models\Periodo;

class PeriodossSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periodo::create([
            'ano' => '2019',
            'semestre' => '1',
            'inicio' => '2019-01-25',
            'final' => '2019-06-25',
        ]);
    }
}
