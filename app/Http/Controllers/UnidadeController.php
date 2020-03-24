<?php

namespace App\Http\Controllers;

use App\Model\Instituicao;
use App\Model\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $unidades = Unidade::all();
        $instituicoes = Instituicao::all();
        return view('unidades', compact('unidades', 'instituicoes'));
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
            'unidade' => 'required|unique:unidades'
        ]);

        Unidade::create([
            'unidade' => $request->unidade,
            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'instituicoes_id' => $request->instituicao
        ]);

        return redirect()->route('unidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function show(Unidade $unidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidade $unidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidade $unidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidade $unidade)
    {
        //
    }
}
