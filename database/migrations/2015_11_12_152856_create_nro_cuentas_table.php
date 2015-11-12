<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNroCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nro_cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nro');
            $table->string('entidad_bancaria');
            $table->integer('id_entpub')->unsigned();
            $table->foreign('id_entpub')->references('id')->on('entidad_publicas')->onDelete('cascade');
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
        Schema::drop('nro_cuentas');
    }
}
