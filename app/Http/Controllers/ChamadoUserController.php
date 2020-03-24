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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chamado =  new Chamado();
        $chamado->protocolo = " prod" . (rand(1000,8000));
        $chamado->titulo =  $request->titulo;
        $chamado->descricao =  $request->descricao;
        $chamado->telefone =  $request->telefone;
        $chamado->tipo_chamado_id = $request->tipoChamado;
        $chamado->status_id = 1;
        $chamado->user_id = 1;

        dd($chamado);
        if ($chamado->save()){
            return redirect()->route('chamados')->with('save','Cadastro de chamado realizado com sucesso.');
        }
        return redirect()->route('chamados')->with('error','Erro ao cadastrar chamado, tente novamente mais tarde.');
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
    public function destroy(Chamado $chamado)
    {
        //
    }
}
