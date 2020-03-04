<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foreign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->unsignedBigInteger('tipo_acesso_id');

            $table->foreign('unidade_id')->references('id')->on('unidades')
                ->onDelete('cascade');
            $table->foreign('tipo_acesso_id')->references('id')->on('tipo_acessos')
                ->onDelete('cascade');
        });

        Schema::table('unidades',function (Blueprint $table) {
            $table->unsignedBigInteger('instituicao_id');

            $table->foreign('instituicao_id')->references('id')->on('instituicoes')
                ->onDelete('cascade');
        });

        Schema::table('observacoes',function (Blueprint $table) {
            $table->unsignedBigInteger('chamado_id');

            $table->foreign('chamado_id')->references('id')->on('chamados')
                ->onDelete('cascade');
        });

        Schema::table('chamados',function (Blueprint $table) {
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('tipo_chamado_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('status_id')->references('id')->on('status')
                ->onDelete('cascade');
            $table->foreign('tipo_chamado_id')->references('id')->on('tipo_chamados')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });

        Schema::table('chamado_atendimentos',function (Blueprint $table) {
            $table->unsignedBigInteger('chamados_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('chamados_id')->references('id')->on('chamados')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });

        Schema::table('atendimento_filas',function (Blueprint $table) {
            $table->unsignedBigInteger('instituicao_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('instituicao_id')->references('id')->on('instituicoes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
