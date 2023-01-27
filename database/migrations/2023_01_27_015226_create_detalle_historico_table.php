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
        Schema::create('detalle_historico', function (Blueprint $table) {
            $table->comment('');
            $table->integer('iddetalle_historico', true);
            $table->integer('idingreso')->index('fk_detalle_ingreso_idx');
            $table->integer('idvehiculo')->index('fk_detalle_historico_vehiculo_idx');
            $table->integer('cantidad');
            $table->decimal('precio_compra', 11);
            $table->decimal('precio_venta', 11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_historico');
    }
};
