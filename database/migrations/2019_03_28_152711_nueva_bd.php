<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NuevaBd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artistas', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->string('Nombre')->nullable();
            $table->string('Pais')->nullable();
            $table->string('Tipo')->nullable();
            $table->string('Fecha_de_inicio')->nullable();
            $table->string('Fecha_de_Jubilacion')->nullable();
            $table->timestamps();
        });
        Schema::create('recordings', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->string('Title')->nullable();
            $table->string('Disambiguation')->nullable();
            $table->string('Disc')->nullable();
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
        Schema::dropIfExists('artistas');
        Schema::dropIfExists('recordings');
    }
}
