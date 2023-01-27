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
            $table->comment('');
            $table->integer('iddetalle_venta', true);
            $table->integer('id_venta')->index('fk_detalle_venta_idx');
            $table->integer('idvehiculo')->index('fk_detalle_venta_vehiculo_idx');
            $table->integer('cantidad');
            $table->decimal('precio_venta', 11);
            $table->decimal('descuento', 11);
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
