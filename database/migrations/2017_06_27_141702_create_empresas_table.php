<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('razao_social');
                $table->string('nome_fantasia');
                $table->string('responsavel',80)->nullable();
                $table->string('cnpj',45)->nullable();
                $table->string('inscricao_estadual',45)->nullable();
                $table->string('endereco',45)->nullable();
                $table->integer('numero')->nullable();
                $table->string('complemento',15)->nullable();
                $table->string('bairro',80)->nullable();
                $table->string('cidade',80)->nullable();
                $table->string('uf',2)->nullable();
                $table->string('cep',15)->nullable();
                $table->string('email',80)->nullable();
                $table->string('site',0)->nullable();
                $table->string('telefone',50)->nullable();
                $table->string('fax',50)->nullable();
                $table->string('celular',50)->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
