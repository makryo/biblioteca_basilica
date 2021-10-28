<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->String('nombre');

            $table->bigInteger('editorial_id')->unsigned();
            $table->foreign('editorial_id')->references('id')->on('editorials');

            $table->bigInteger('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipo_libros');

            $table->bigInteger('pais_id')->unsigned();
            $table->foreign('pais_id')->references('id')->on('pais_libros');

            $table->bigInteger('autor_id')->unsigned();
            $table->foreign('autor_id')->references('id')->on('autors');

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
        Schema::dropIfExists('libros');
    }
}
