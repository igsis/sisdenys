<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'login' => 'admin',
            'nome' => 'Admin',
            'email' => 'teste@teste.com',
            'telefone' => '(11) 95374-6414',
            'created_at'=> '2020-05-11 13:21:16',
            'updated_at'=> '2020-05-11 13:21:16',
            'tipo_acesso_id' => '1',
            'unidade_id' => '1',
        ]);
    }
}
