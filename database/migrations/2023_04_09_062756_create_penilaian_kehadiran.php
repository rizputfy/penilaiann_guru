<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianKehadiran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_kehadiran', function (Blueprint $table) {
            $table->id();
            $table->float('skor');
            $table->bigInteger('id_jenis_kehadirans')->unsigned();
            $table->bigInteger('id_penilaians')->unsigned();
            $table->timestamps();
        });
        Schema::table('penilaian_kehadiran', function (Blueprint $table) {
            $table->foreign('id_jenis_kehadirans')->references('id_jenis_kehadiran') ->on('jenis_kehadiran')
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
        Schema::dropIfExists('penilaian_kehadiran');
    }
}
