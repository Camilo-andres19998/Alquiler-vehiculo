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
          $table->unsignedBigInteger('iddetalle_historico');
        $table->unsignedBigInteger('idingreso');
        $table->increments('idvehiculo');
        $table->integer('cantidad');
        $table->decimal('precio_compra', 11, 2);
        $table->decimal('precio_venta', 11, 2);
        $table->timestamps();

        $table->foreign('idingreso')->references('idingreso')->on('ingreso')->onDelete('no action')->onUpdate('no action');
        $table->foreign('idvehiculo')->references('idvehiculo')->on('vehiculo')->onDelete('no action')->onUpdate('no action');
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
