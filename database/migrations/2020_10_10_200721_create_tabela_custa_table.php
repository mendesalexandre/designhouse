<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelaCustaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabela_custa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ativo')->default('S');
            $table->bigInteger('codigo')->unsigned()->nullable();
            $table->bigInteger('codigo_tj')->unsigned()->nullable();
            $table->bigInteger('codigo_tj_relacionado')->unsigned()->nullable();
            $table->string('descricao_servico')->nullable();
            $table->float('emolumentos')->nullable();
            $table->float('registro_civil')->nullable();
            $table->float('judiciario')->nullable();
            $table->float('associacoes')->nullable();
            $table->float('valor_servico')->nullable();
            $table->float('valor_maximo')->nullable();
            $table->float('valor_incremento')->nullable();
            $table->float('valor_gatilho')->nullable();
            $table->float('valor_gatilho_inicial')->nullable();
            $table->float('valor_gatilho_final')->nullable();
            $table->text('acessa_referencia')->nullable();
            $table->text('selo_digital')->default('S');
            $table->string('ato_relacionado')->nullable();
            $table->float('percentual_issqn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabela_custa');
    }
}
