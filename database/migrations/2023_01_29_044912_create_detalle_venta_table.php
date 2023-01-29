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
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->unsignedBigInteger('iddetalle_venta');
            $table->unsignedBigInteger('id_venta');
            $table->increments('idvehiculo');
            $table->integer('cantidad');
            $table->decimal('precio_venta', 11, 2);
            $table->decimal('descuento', 11, 2);
            $table->foreign('idvehiculo')->references('idvehiculo')->on('vehiculo')->onDelete('no action')->onUpdate('no action');
            $table->foreign('id_venta')->references('idventa')->on('venta')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_venta');
    }
};
