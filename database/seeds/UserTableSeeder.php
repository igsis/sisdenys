<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoAcesso = new \App\Model\TipoAcesso();
        $tipoAcesso->tipo_acesso = 'admin';
        $tipoAcesso->save();

        $tipoAcesso = new \App\Model\TipoAcesso();
        $tipoAcesso->tipo_acesso = 'atendente';
        $tipoAcesso->save();

        $tipoAcesso = new \App\Model\TipoAcesso();
        $tipoAcesso->tipo_acesso = 'usuario';
        $tipoAcesso->save();

        $user =  new \App\User();
        $user->login = 'admin';
        $user->nome = 'admin';
        $user->email = 'admin@admin.com.br';
        $user->telefone = '99999-9999';
        $user->tipo_acesso = 1;
                
    }
}
