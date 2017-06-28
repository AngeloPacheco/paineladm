<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('descricao',250);
                $table->integer('estoque')->nullable();
                $table->decimal('preco_custo',8,2);
                $table->decimal('preco_venda',8,2);
                $table->decimal('margem_lucro',8,2);
                $table->decimal('peso',8,2)->nullable();
                $table->string('alturaxlargura',50)->nullable();
                $table->string('cor',50)->nullable();
                $table->boolean('novidade')->nullable();
                $table->boolean('ativo');
                $table->string('obs',250)->nullable();
                $table->integer('categoria_id')->unsigned();
                $table->foreign('categoria_id')->references('id')->on('categorias');
                $table->integer('medida_id')->unsigned();
                $table->foreign('medida_id')->references('id')->on('medidas');
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
        Schema::dropIfExists('produtos');
    }
}
