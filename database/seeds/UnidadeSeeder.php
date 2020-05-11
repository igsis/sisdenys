<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades')->insert([
            'unidade' => 'Teste',
            'cep' => '00000-000',
            'endereco' => 'Rua teste',
            'cidade' => 'São Paulo',
            'complemento' => '',
            'numero' => '12',
            'bairro' => 'Teste',
            'instituicoes_id' => '1',
        ]);
    }
}
