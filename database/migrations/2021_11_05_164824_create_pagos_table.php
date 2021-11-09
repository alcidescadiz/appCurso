<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha');
            $table->integer('id_cursos')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('id_hijos')->unsigned();
            $table->string('tipopago');
            $table->double('costo', 8, 2);
            $table->string('verificar');
            $table->string('estatus');
	        $table->foreign('id_cursos')->references('id')->on('cursos');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_hijos')->references('id')->on('hijos');
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
        Schema::dropIfExists('pagos');
    }
}
