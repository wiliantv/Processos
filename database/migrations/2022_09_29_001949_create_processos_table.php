<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->integer("numero");
            $table->string("classe");
            $table->string("andamento");
            $table->timestamp("audiencia");
            $table->double("valor", 2);
            $table->foreignId('id_pessoa')->constrained('pessoas')->onDelete('cascade');
            $table->foreignId('id_usuario')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['numero', 'id_pessoa', 'id_usuario']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processos');
    }
}
