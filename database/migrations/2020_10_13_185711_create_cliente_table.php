<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tipo_pessoa_id')->nullable();
            $table->unsignedBigInteger('endereco_id')->nullable();
            $table->string('ativo')->default('S');
            $table->string('nome')->nullable();
            $table->string('sobrenome')->nullable();
            $table->string('cpf_cnpj')->nullable();
            $table->string('email')->nullable();
            $table->longText('observacao')->nullable();
            $table->string('telefone')->nullable();
            $table->string('nome_mae')->nullable();
            $table->string('nome_pai')->nullable();
            $table->string('celular', 50)->nullable();
            $table->string('profissao')->nullable();
            $table->string('cnh')->nullable();
            $table->string('rg')->nullable();
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
        Schema::dropIfExists('cliente');
    }
}
