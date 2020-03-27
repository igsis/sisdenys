<?php

namespace App\Http\Controllers;

use App\Model\Atendentes;
use App\Model\Chamado;
use App\Model\Status;
use App\Model\TipoChamado;
use Illuminate\Http\Request;

class ChamadoAtendenteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

        if ($chamado->atendentes->first() == null){
            $atendente = new Atendentes();
            $atendente->user_id = 7;
            $atendente->chamado_id = $id;
            if($atendente->save()){
                return redirect()->route('atendente.chamados')->with('save','Status do Chamado atualizado com sucesso');
            }
        }
        else{
            $atendente = Atendentes::where('chamado_id',$id)->get();
            $atendente->user_id = 7;
            if ($atendente->saveOrFail()){
                return redirect()->route('atendente.chamados')->with('save','Status do Chamado atualizado com sucesso');
            }
        }
        return redirect()->route('atendente.chamados')->with('error','Erro ao alterar status.');
    }
}
