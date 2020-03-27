<?php

namespace App\Http\Controllers;

use App\Model\Instituicao;
use App\Model\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $unidade = new Unidade();
        $unidade->unidade = $request->unidade;
        $unidade->cep = $request->cep;
        $unidade->endereco = $request->endereco;
        $unidade->numero = $request->numero;
        $unidade->bairro = $request->bairro;
        $unidade->instituicoes_id = $request->instituicao;


        if ($unidade->save()){
            return redirect()->route('unidades')->with('save','Cadastrado com sucesso');
        }

        return redirect()->route('unidades')->with('error','Erro ao tentar cadastrar');



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
    public function update(Request $request)
    {
        $unidade =  Unidade::findOrFail($request->id);
        $unidade->unidade = $request->unidade;
        $unidade->cep = $request->cep;
        $unidade->endereco = $request->endereco;
        $unidade->numero = $request->numero;
        $unidade->bairro = $request->bairro;
        $unidade->instituicoes_id = $request->instituicao;

        if ($unidade->save()){
            return redirect()->route('unidades')    ->with('save','Editado com sucesso');
        }

        return redirect()->route('unidades')->with('error','Falha ao fazer alteração');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Unidade::find($request->id)->delete()){
            return redirect('/unidades')->with('save','Unidade deletada com sucesso');
        }
        return redirect('/unidades')->with('error','Erro ao tentar apagar');
    }
}
