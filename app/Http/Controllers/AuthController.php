<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('login');
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
                    }
                }else{
                    echo 'não logou';
                }
            } else {
                echo "Não entrou";
                echo  "<br>$ldapbind";
            }
        }else{
            //echo $ldapconn;
        }
    }


}
