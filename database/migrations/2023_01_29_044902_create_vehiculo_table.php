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
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->increments('idvehiculo');
            $table->unsignedBigInteger('idmarca')->nullable();
            $table->string('patente', 50)->nullable();
            $table->string('modelo', 100)->nullable();
            $table->string('descripcion', 512)->nullable();
            $table->string('imagen', 50)->nullable();
            $table->string('estado', 20)->nullable();
            $table->unsignedBigInteger('venta')->nullable();
            $table->timestamps();
    
            $table->foreign('idmarca')
                ->references('idmarca')
                ->on('marca')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculo');
    }
};
