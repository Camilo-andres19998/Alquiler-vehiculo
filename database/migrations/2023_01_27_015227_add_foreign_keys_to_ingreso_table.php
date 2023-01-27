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
        Schema::table('ingreso', function (Blueprint $table) {
            $table->foreign(['idmecanico'], 'fk_ingreso_persona')->references(['idpersona'])->on('persona')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingreso', function (Blueprint $table) {
            $table->dropForeign('fk_ingreso_persona');
        });
    }
};
