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
        $status = Status::all();
        return view('visualizar-chamado',compact('chamado','status'));
    }

    public function update(Request $request, $id){

        $chamado = Chamado::find($id);
        $chamado->status_id = $request->status;
        $chamado->save();

        return redirect()->route('atendente.chamados')->with('save','Status do Chamado atualizado com sucesso');
    }
}
