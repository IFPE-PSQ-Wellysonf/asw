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
        foreach($aulaRegular as $aula){
            $agendamentosRegulares = $this->diasNoMes($aula->dia,Carbon::now()->month,Carbon::now()->year,$aula->inicio,$aula->fim);
        }
        dd($periodo,$aulaRegular,$agendamentosRegulares);
    }

    function convertHorarioRegular()
    {
        $periodo = Periodo::where('ano', Carbon::now()->year);
    }

    function diasNoMes($day,$month,$year,$timeStart,$timeEnd){
        switch($day){
            case 1:
                $dia = 'monday';
                break;
            case 2:
                $dia = 'tuesday';
                break;
            case 3:
                $dia = 'wednesday';
                break;
            case 4:
                $dia = 'thursday';
                break;
            case 5:
                $dia = 'friday';
                break;
            case 6:
                $dia = 'saturday';
                break;
            case 7:
                $dia = 'sunday';
                break;
        }
        $ts=strtotime("first $dia of $year-$month-01");
        $ls=strtotime('last day of '.$year.'-'.$month.'-01');
        $agend=array(date('Y-m-d ', $ts) . $timeStart);
        while(($ts=strtotime('+1 week', $ts))<=$ls){
            $agend[]=date('Y-m-d ',$ts) . $timeStart;
        }return $agend;
    }
}
