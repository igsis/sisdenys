<?php

namespace App\Http\Controllers;

use App\Model\Chamado;
use App\Model\TipoChamado;
use Illuminate\Http\Request;

class ChamadoUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chamados = Chamado::all();
        $tipoChamado = TipoChamado::all();
        return view('chamados-usuario', compact('chamados','tipoChamado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $protocolo = date('YmdHms');
        $user = 2;

        $chamado =  new Chamado();
        $chamado->protocolo = $protocolo;
        $chamado->titulo =  $request->titulo;
        $chamado->descricao =  $request->descricao;
        $chamado->telefone =  $request->telefone;
        $chamado->tipo_chamado_id = $request->tipoChamado;
        $chamado->status_id = 1;
        $chamado->user_id = $user;

        $chamado->save();

        return redirect()->route('chamados')->with('save','Cadastro de chamado realizado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function show(Chamado $chamado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function edit(Chamado $chamado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chamado $chamado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $chamado = Chamado::find($request->id);

        if ($chamado->delete()){
            return redirect()->route('chamados')->with('save','Chamado cancelado com sucesso.');
        }

        return redirect()->route('chamados')->with('error','Error ao tentar cancelar, tente novamente!');
    }
}
