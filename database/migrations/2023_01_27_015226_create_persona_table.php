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
        Schema::create('persona', function (Blueprint $table) {
           // $table->index('idpersona');

           $table->bigIncrements('idpersona');
            $table->string('tipo_persona', 20);
            $table->string('nombre', 100);
            $table->string('tipo_documento', 20)->nullable();
            $table->string('num_documento', 15)->nullable();
            $table->string('direccion', 70)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('email', 50)->nullable();

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
        Schema::dropIfExists('persona');
    }
};
