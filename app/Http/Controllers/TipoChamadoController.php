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
        //
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
    public function update(Request $request, $id)
    {
        $tipo =  TipoChamado::find($id);
        $tipo->tipo_chamado = $request->tipo;

        if ($tipo->save()){
            return redirect('/tipoChamados')->with('save',true);
        }

        return redirect('/tipoChamados')->with('save',false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\TipoChamado  $tipoChamado
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoChamado $tipoChamado)
    {
        //
    }
}
