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
        Schema::create('tickets', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->unsignedInteger('autor_id');
            $table->unsignedInteger('departamento_id');
            $table->string('clasificacion');
            $table->string('detalles');
            $table->string('respuesta');
            $table->string('status');
            $table->timestamps();
            $table->foreign('autor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
