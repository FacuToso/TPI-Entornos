<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('inscripciones', function (Blueprint $table) {
            
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_alumno')->unsigned();
            $table->bigInteger('id_consulta')->unsigned();
            $table->string('observaciones');
            $table->timestamps();

            $table->foreign('id_alumno')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_consulta')->references('id')->on('consultas')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
