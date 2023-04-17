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
            $table->id('id_penilaian_kehadiran');
            $table->float('skor', 8, 2);
            $table->bigInteger('kehadiran_id_kehadiran')->unsigned();
            $table->bigInteger('penilaians_id_penilaian')->unsigned();
            $table->timestamps();
        });
        Schema::table('penilaian_kehadiran', function (Blueprint $table) {
            $table->foreign('kehadiran_id_kehadiran')->references('id_jenis_kehadiran') ->on('jenis_kehadiran')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('penilaians_id_penilaian')->references('penilaian') ->on('penilaian')
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
