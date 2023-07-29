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
            $table->bigInteger('id_periode')->unsigned();
            $table->integer('id_guru');
            $table->bigInteger('id_penilaian_kehadiran')->unsigned();
            $table->bigInteger('id_penilaian_pembelajaran')->unsigned();
            $table->bigInteger('id_penilaian_aksi_nyata')->unsigned();
            $table->timestamps();
        });
        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('id_periode')->references('periode') ->on('periode')
            ->onDelete('cascade')->onUpdate('cascade');
          });
        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('id_penilaian_kehadiran')->references('id') ->on('penilaian_kehadiran')
            ->onDelete('cascade')->onUpdate('cascade');
          });
        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('id_penilaian_pembelajaran')->references('id') ->on('penilaian_pembelajaran')
            ->onDelete('cascade')->onUpdate('cascade');
          });
          Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('id_penilaian_aksi_nyata')->references('id') ->on('penilaian_aksi_nyata')
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
