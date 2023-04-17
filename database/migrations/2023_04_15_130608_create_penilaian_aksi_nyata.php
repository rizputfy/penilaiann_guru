<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianAksiNyata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_aksi_nyata', function (Blueprint $table) {
            $table->id('id_penilaian_aksi_nyata');
            $table->float('skor_aksi_nyata', 8, 2);
            $table->string('deskripsi');
            $table->string('link_vidio');
            $table->string('link_dokumentasu');
            $table->integer('volume');
            $table->bigInteger('jenis_aksi')->unsigned();
            $table->bigInteger('penilaian_id_penilaian')->unsigned();
            $table->timestamps();
        });

        Schema::table('penilaian_aksi_nyata', function (Blueprint $table) {
            $table->foreign('jenis_aksi')->references('id_jenis_aksi_nyata') ->on('jenis_aksi_nyata')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('penilaian_id_penilaian')->references('penilaian') ->on('penilaian')
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
        Schema::dropIfExists('penilaian_aksi_nyata');
    }
}
