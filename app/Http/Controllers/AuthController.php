<?php

namespace App\Http\Controllers;

use App\Model\Unidade;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('Auth.login');
    }

    public function autenticacao(Request $request)
    {
        // using ldap bind
        $ldaprdn  =  "{$request->usuario}@rede.sp";     // ldap rdn or dn
        $ldappass = $request->senha;  // associated password

        // connect to ldap server
        $ldapconn = ldap_connect("10.10.68.44",389)
        or die("Conexão perdida com servidor.");

        if ($ldapconn) {
            // binding to ldap server
            $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass) or die('Usuario ou senha invalidos');
            // verify binding
            if ($ldapbind) {
                $user = \App\User::where('login',$request->usuario)->first();

                if (Auth::loginUsingId($user->id)){
                    if (Auth::check() === true){
                        return redirect('/');
                    }else{

                    }
                }else{
                    return redirect()->route('registrar',['login'=>$request->usuario]);
                }
            } else {
                echo "Não entrou";
                echo  "<br>$ldapbind";
            }
        }else{
            //echo $ldapconn;
        }
    }

    public function registro($login = '')
    {
        $unidades = Unidade::all();
        if ($login != ''){
            return view('Auth.registro',compact('login','unidades'));
        }
    }

    public function cadastrarUser(Request $request)
    {
        $user = new User();
        $user->login =  $request->login;
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->telefone = $request->telefone;
        $user->tipo_acesso_id = 3;
        $user->unidade_id = $request->unidade;

        if ($user->save()){
            $novo = User::where('login',$request->login)->first();
            Auth::loginUsingId($user->id);

            return redirect('/');
        }

        return redirect('/login')->with(['Errors','Ocorreu um erro ao fazer registro, tente novamente']);
    }


    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

}
