<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrasoProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praso_processos', function (Blueprint $table) {
            $table->id();
            $table->string("tipo");
            $table->date("data_final");
            $table->string("situacao")->nullable();
            $table->foreignId('id_processo')->constrained('processos')->onDelete('cascade');
            $table->foreignId('id_usuario')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->unique('tipo', 'id_processo', 'id_usuario',"situacao");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('praso_processos');
    }
}
