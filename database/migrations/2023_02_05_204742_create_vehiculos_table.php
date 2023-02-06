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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('idvehiculo');
            $table->unsignedBigInteger('idmarca')->nullable();
            $table->string('marca',50)->nullable();
            $table->string('modelo',50)->nullable();
            $table->timestamps();


            $table->foreign('idmarca')
            ->references('idmarca')
            ->on('marcas')
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
        Schema::dropIfExists('vehiculos');
    }
};
