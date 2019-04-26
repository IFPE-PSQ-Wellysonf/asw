<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAularegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aularegs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_sala');
            $table->unsignedBigInteger('id_periodo');
            $table->unsignedBigInteger('id_responsavel');
            $table->enum('dia', ['dom','seg','ter','qua','qui','sex','sab']);
            $table->time('inicio');
            $table->time('fim');
            $table->timestamps();
            $table->foreign('id_sala')->references('id')->on('salas');
            $table->foreign('id_periodo')->references('id')->on('periodos');
            $table->foreign('id_responsavel')->references('id')->on('users');
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
            $table->dropForeign(['id_sala','id_periodo','id_responsavel']);
        });
        Schema::dropIfExists('aularegs');
    }
}
