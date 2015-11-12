<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTieneRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiene_requisitos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tramite')->unsigned();
            $table->integer('id_requisito')->unsigned();
            $table->foreign('id_tramite')->references('id')->on('tramites')->onDelete('cascade');
            $table->foreign('id_requisito')->references('id')->on('requisitos')->onDelete('cascade');
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
        Schema::drop('tiene_requisitos');
    }
}
