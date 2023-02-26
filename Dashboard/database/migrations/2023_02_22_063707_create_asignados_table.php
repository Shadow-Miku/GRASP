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
        Schema::create('asignados', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id('idAsg');
            $table->unsignedBigInteger('encargadoId')->nullable();
            $table->unsignedBigInteger('ticketId')->nullable();
            $table->timestamps();
            $table->foreign('encargadoId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ticketId')->references('idTk')->on('tickets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignados');
    }
};
