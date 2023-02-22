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
            $table->id();
            $table->unsignedInteger('encargado_id');
            $table->unsignedInteger('ticket_id');
            $table->string('observacion');
            $table->timestamps();
            $table->foreign('encargado_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
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
