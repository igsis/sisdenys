<?php

namespace App\Http\Controllers;

use App\Model\Atendentes;
use App\Model\Chamado;
use App\Model\Status;
use App\Model\TipoChamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChamadoAtendenteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $chamados = Chamado::where('status_id','!=',3)->get();
        $instituicao = Auth::user()->unidade->instituicao->id;
        return view('chamados-atendente',compact('chamados','instituicao'));
    }

    public function show($id)
    {
        $chamado = Chamado::find($id);
        $status = Status::all();
        return view('visualizar-chamado',compact('chamado','status'));
    }

    public function update(Request $request, $id){
        $userId = Auth::user()->id;

        $chamado = Chamado::find($id);
        $chamado->status_id = $request->status;

        if ($chamado->atendentes->first() == null){
            $atendente = new Atendentes();
            $atendente->user_id = $userId;
            $atendente->chamado_id = $id;
            $atendente->save();
            $chamado->save();
            return redirect()->route('atendente.chamados')->with('save','Status do Chamado atualizado com sucesso');
        }
        else{
            $atendente = Atendentes::where('chamado_id',$id)->first();
            $atendente->user_id = $userId;
            $atendente->save();
            $chamado->save();
            return redirect()->route('atendente.chamados')->with('save','Status do Chamado atualizado com sucesso');
        }

        return redirect()->route('atendente.chamados')->with('error','Erro ao alterar status.');
    }
}
