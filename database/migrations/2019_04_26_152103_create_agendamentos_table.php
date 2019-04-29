<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_sala');
            $table->unsignedBigInteger('id_responsavel');
            $table->date('dia');
            $table->time('inicio');
            $table->time('fim');
            $table->string('descricao');
            $table->foreign('id_sala')->references('id')->on('salas');
            $table->foreign('id_responsavel')->references('id')->on('users');
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
        Schema::table('aularegs', function (Blueprint $table) {
            $table->dropForeign(['id_sala','id_responsavel']);
        });
        Schema::dropIfExists('agendamentos');
    }
}
