<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('cpf',11)->nullable();
            $table->string('nome',50)->nullable();
            $table->date('dtnascimento')->nullable();
            $table->string('sobrenome',15)->nullable();
            $table->string('cnpj',14)->nullable();
            $table->string('razaosocial',50)->nullable();
            $table->string('nomefantasia',50)->nullable();
            $table->string('cep',8);
            $table->string('logradouro',50);
            $table->string('numero',4);
            $table->string('complemento',50)->nullable();
            $table->string('bairro',50);
            $table->string('cidade',50);
            $table->string('uf',8);
            $table->integer('tipocliente')->nullable();

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
        Schema::dropIfExists('clientes');
    }
}
