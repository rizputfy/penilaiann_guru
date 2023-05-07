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
            $table->id();
            $table->float('skor_aksi_nyata', 8, 2);
            $table->string('deskripsi');
            $table->string('link_vidio');
            $table->string('link_dokumentasi');
            $table->integer('volume');
            $table->bigInteger('id_jenis_aksi')->unsigned();
            $table->timestamps();
        });
        Schema::table('penilaian_aksi_nyata', function (Blueprint $table) {
            $table->foreign('id_jenis_aksi')->references('id') ->on('jenis_aksi_nyata')
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
