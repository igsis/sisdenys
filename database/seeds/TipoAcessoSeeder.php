<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoAcessoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_acessos')->insert([
            'tipo_acesso' => 'Admin'
        ]);

        DB::table('tipo_acessos')->insert([
            'tipo_acesso' => 'Atendente'
        ]);

        DB::table('tipo_acessos')->insert([
            'tipo_acesso' => 'Usuario'
        ]);
    }
}
