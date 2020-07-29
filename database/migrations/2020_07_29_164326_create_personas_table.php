<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre',255);
            $table->string('Ape_Pat',255);
            $table->string('Ape_Mat',255);
            $table->string('RFC',255);
            $table->string('CURP',255);
            $table->date('Fecha_Nacimiento');
            $table->dateTime('Fecha_Modificacion');
            $table->string('Avatar',2048)->default('foto.jpg');
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
        Schema::dropIfExists('personas');
    }
}
