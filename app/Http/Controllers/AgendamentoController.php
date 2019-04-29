<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Agendamento;
use App\Models\Aulareg;
use App\Models\Periodo;

class AgendamentoController extends Controller
{
    public function index()
    {
        $periodo = Periodo::where('ano', Carbon::now()->year)
                            ->where('inicio', '<=', Carbon::now()->format('Y-m-d'))
                            ->where('final', '>=', Carbon::now()->format('Y-m-d'))
                            ->pluck('id');
        $aulaRegular = Aulareg::whereIn('id_periodo', $periodo)
                                ->get();


        $fifth = countFridays(1,Carbon::now()->month,Carbon::now()->year);
        dd($periodo,$aulaRegular,$fifth);
    }

    public function convertHorarioRegular()
    {
        $periodo = Periodo::where('ano', Carbon::now()->year);
    }

    function countFridays($day,$month,$year){
        $ts=strtotime("first friday of $year-$month-01");
        $ls=strtotime('last day of '.$year.'-'.$month.'-01');
        $fridays=array(date('Y-m-d', $ts));
        while(($ts=strtotime('+1 week', $ts))<=$ls){
            $fridays[]=date('Y-m-d', $ts);
        }return $fridays;
    }
}
