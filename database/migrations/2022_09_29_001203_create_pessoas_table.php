<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string("cpf")->unique();
            $table->string("nome");
            $table->string("rg")->nullable();
            $table->string("estado_civil")->nullable();
            $table->string("endereco")->type("TEXT");
            $table->string("profissao")->nullable();
            $table->string("telefone");
            $table->integer("id_usuario")->references('id')->on("users");
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
        Schema::dropIfExists('pessoas');
    }
}
