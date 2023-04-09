<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisKehadiran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_kehadiran', function (Blueprint $table) {
            $table->id('id_jenis_kehadiran')->unsigned()->primary('id_jenis_kehadiran');
            $table->string('jenis_kehadiran');
            $table->timestamps();

            $table->foreign('id_jenis_kehadiran')
                  ->references('id')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_kehadiran');
    }
}
