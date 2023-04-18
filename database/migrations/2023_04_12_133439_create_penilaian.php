<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('penilaian');
            $table->string('keterangan');
            $table->string('periode_penilaian');
            $table->bigInteger('id_periode')->unsigned();
            $table->integer('penilaian_kehadiran');
            $table->integer('id_guru');
            $table->integer('id_penilaian_kehadiran');
            $table->timestamps();
        });
        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('id_periode')->references('periode') ->on('periode')
            ->onDelete('cascade')->onUpdate('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
}
