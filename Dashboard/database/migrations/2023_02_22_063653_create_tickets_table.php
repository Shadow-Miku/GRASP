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
            
            $table->id('idTk');
            $table->unsignedBigInteger('autor');
            $table->unsignedBigInteger('departamento');
            $table->string('clasificacion');
            $table->string('detalles')->nullable();
            $table->string('respuesta')->default('Sin comentarios')->nullable();
            $table->string('status')->default('Pendiente')->nullable();
            $table->timestamps();
            $table->foreign('autor')->references('idUs')->on('usuarios')->onDelete('cascade');
            $table->foreign('departamento')->references('idDep')->on('departamentos')->onDelete('cascade');
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
