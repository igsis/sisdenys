<?php

namespace App\Http\Controllers;

use App\Model\TipoAcesso;
use App\Model\Unidade;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $usuarios = User::all();
        $unidades = Unidade::all();
        $tipoAcessos = TipoAcesso::all();

        return view('usuarios', compact('usuarios', 'unidades', 'tipoAcessos'));
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
     * @param  \App\Model\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $unidades = Unidade::all();
        $tipoAcessos = TipoAcesso::all();
        return view('meu_usuario', compact('user', 'unidades', 'tipoAcessos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user =  User::findOrFail($request->id);

        $this->validate($request, [
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->telefone = $request->telefone;
//        $user->tipo_acesso_id = $request->tipoAcesso;
        $user->unidade_id = $request->unidade;

        if ($user->save()){
            return redirect()->back()->with('save','Editado com sucesso');
        }

        return redirect()->route('usuarios')->with('error','Falha ao fazer alteração');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\User $user
     */
    public function destroy(Request $request)
    {
        if (User::find($request->id)->delete()){
            return redirect('/usuarios')->with('save','Usuário deletado com sucesso');
        }
        return redirect('/usuarios')->with('error','Erro ao tentar apagar');
    }
}
