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
        Schema::create('venta', function (Blueprint $table) {
           
                $table->bigIncrements('idventa');
                $table->unsignedBigInteger('idcliente');
                $table->string('tipo_comprobante', 45);
                $table->string('serie_comprobante', 7);
                $table->string('num_comprobante', 10);
                $table->datetime('fecha_hora');
                $table->decimal('impuesto', 4, 2);
                $table->decimal('total_venta', 11, 2);
                $table->string('estado', 20);
                $table->foreign('idcliente')->references('idpersona')->on('persona')->onDelete('no action')->onUpdate('no action');
                $table->timestamps();
            });
            
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
};
