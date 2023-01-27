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
        Schema::table('detalle_venta', function (Blueprint $table) {
            $table->foreign(['id_venta'], 'fk_detalle_venta')->references(['idventa'])->on('venta')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idvehiculo'], 'fk_detalle_venta_vehiculo')->references(['idvehiculo'])->on('vehiculo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_venta', function (Blueprint $table) {
            $table->dropForeign('fk_detalle_venta');
            $table->dropForeign('fk_detalle_venta_vehiculo');
        });
    }
};
