<?php

namespace App\Http\Controllers;

use App\Model\Chamado;
use App\Model\Status;
use App\Model\TipoChamado;
use Illuminate\Http\Request;

class ChamadoAtendenteController extends Controller
{
    public function index(){
        $chamados = Chamado::where('status_id','!=',3)->get();

        return view('chamados-atendente',compact('chamados'));
    }

    public function show($id)
    {
        $chamado = Chamado::find($id);
        return view('visualizar-chamado',compact('chamado'));
    }
}
