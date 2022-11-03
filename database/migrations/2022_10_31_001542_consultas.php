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
        Schema::create('consultas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_materia')->unsigned();
            $table->bigInteger('id_profesor')->unsigned();
            $table->datetime('fecha');
            $table->string('tipo');
            $table->string('lugar');
            $table->string('nombre');
            $table->timestamps();

            $table->foreign('id_materia')->references('id')->on('materias')->onDelete('cascade');
            $table->foreign('id_profesor')->references('id')->on('users')->onDelete('cascade');

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
