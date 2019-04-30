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
        $aulaRegular = Aulareg::with('responsavel')->whereIn('id_periodo', $periodo)
                                ->get();
        foreach($aulaRegular as $aula){
            $descri = $aula->descricao . " (" . $aula->responsavel->name . ")";
            $agendamentosRegulares = $this->diasNoMes($aula->id,$aula->dia,Carbon::now()->month,Carbon::now()->year,$aula->inicio,$aula->fim,$descri);
        }
        dd($agendamentosRegulares);
    }

    function convertHorarioRegular()
    {
        $periodo = Periodo::where('ano', Carbon::now()->year);
    }

    function diasNoMes($id,$day,$month,$year,$timeStart,$timeEnd,$description){
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
        $agend=array();
        $agend[]=[
            'id' => "AR" . $id,
            'title' => $description,
            'start' => date('c',strtotime(date('Y-m-d ', $ts) . $timeStart)),
            'end' => date('c',strtotime(date('Y-m-d ', $ts) . $timeEnd))
        ];
        while(($ts=strtotime('+1 week', $ts))<=$ls){
            $agend[]=[
                'id' => "AR" . $id,
                'title' => $description,
                'start' => date('c',strtotime(date('Y-m-d ', $ts) . $timeStart)),
                'end' => date('c',strtotime(date('Y-m-d ', $ts) . $timeEnd))
            ];

            /* date('c',strtotime(date('Y-m-d ', $ts) . $timeStart)); */
        }return $agend;
    }
}
