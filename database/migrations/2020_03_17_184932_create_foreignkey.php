<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedTinyInteger('tipo_acesso_id');
            $table->unsignedSmallInteger('unidade_id');

            $table->foreign('tipo_acesso_id')
                ->references('id')
                ->on('tipo_acessos')
                ->onDelete('cascade');

            $table->foreign('unidade_id')
                ->references('id')
                ->on('unidades')
                ->onDelete('cascade');
        });

        Schema::table('unidades', function (Blueprint $table) {
            $table->unsignedTinyInteger('instituicoes_id');

            $table->foreign('instituicoes_id')
                ->references('id')
                ->on('instituicoes')
                ->onDelete('cascade');
        });

        Schema::table('notas', function (Blueprint $table) {
            $table->unsignedBigInteger('chamado_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('chamado_id')
                ->references('id')
                ->on('chamados')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::table('chamados', function (Blueprint $table) {
            $table->unsignedTinyInteger('tipo_chamado_id');
            $table->unsignedTinyInteger('status_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('tipo_chamado_id')
                ->references('id')
                ->on('tipo_chamados')
                ->onDelete('cascade');

            $table->foreign('status_id')
                ->references('id')
                ->on('status')
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
