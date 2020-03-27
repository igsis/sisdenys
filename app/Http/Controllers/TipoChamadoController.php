<?php

namespace App\Http\Controllers;

use App\Model\TipoChamado;
use Illuminate\Http\Request;

class TipoChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo = TipoChamado::all();
        return view('tipo-chamado',['tipos' => $tipo]);
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
        $this->validate($request, [
            'tipoChamado' => 'required|unique:tipo_chamados,tipo_chamado'
        ]);

        $tipo =  new TipoChamado();
        $tipo->tipo_chamado =  $request->tipoChamado;
        if ($tipo->save()){
            return redirect()->route('tipoChamado')->with('save','Cadastrado com sucesso');
        }

        return redirect()->route('tipoChamado')->with('error','Erro ao tentar cadastrar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\TipoChamado  $tipoChamado
     * @return \Illuminate\Http\Response
     */
    public function show(TipoChamado $tipoChamado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\TipoChamado  $tipoChamado
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoChamado $tipoChamado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\TipoChamado  $tipoChamado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tipo =  TipoChamado::find($request->id);

        $this->validate($request, [
            'tipoChamado' => 'required|unique:tipo_chamados,tipo_chamado,'.$tipo->id,
        ]);

        $tipo->tipo_chamado = $request->tipoChamado;

        if ($tipo->save()){
            return redirect('/tipoChamados')->with('save','Editado com sucesso');
        }

        return redirect('/tipoChamados')->with('error','Falha ao fazer alteração');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\TipoChamado  $tipoChamado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (TipoChamado::find($request->id)->delete()){
            return redirect('/tipoChamados')->with('save','Tipo de chamado deletado com sucesso');
        }
        return redirect('/tipoChamados')->with('error','Erro ao tentar apagar');
    }
}
