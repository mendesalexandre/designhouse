<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemServicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_servico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data_entrada')->nullable();
            $table->time('horario')->nullable();
            $table->date('previsao_entrega')->nullable();
            $table->longText('descricao')->nullable();
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('documento_id')->nullable();
            $table->unsignedBigInteger('solicitante_id')->nullable();
            $table->unsignedBigInteger('funcionario_id')->nullable();
            $table->unsignedBigInteger('situacao_pgto_id')->nullable();
            $table->uuid('hash');
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
        Schema::dropIfExists('ordem_servico');
    }
}
