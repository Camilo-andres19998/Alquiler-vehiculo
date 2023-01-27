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
            $table->comment('');
            $table->integer('idvehiculo', true);
            $table->integer('idmarca')->nullable()->index('fk_vehiculo_marca_idx');
            $table->string('patente', 50)->nullable();
            $table->string('marca', 100);
            $table->string('modelo', 100);
            $table->string('descripcion', 512)->nullable();
            $table->string('imagen', 50)->nullable();
            $table->string('estado', 20);
            $table->integer('venta')->nullable();
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
