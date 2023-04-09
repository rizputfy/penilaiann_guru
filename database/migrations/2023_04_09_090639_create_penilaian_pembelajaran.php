<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianPembelajaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_pembelajaran', function (Blueprint $table) {
            $table->id('id_penilaian_pembelajaran');
            $table->float('amount', 8, 2);
            $table->integer('id_penilaian');
            $table->bigInteger('id_jenis_pembelajaran')->unsigned();
            $table->timestamps();
        });
        Schema::table('penilaian_pembelajaran', function (Blueprint $table) {
          $table->foreign('id_jenis_pembelajaran')->references('id_jenis_penilaian') ->on('jenis_pembelajaran')
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
        Schema::dropIfExists('penilaian_pembelajaran');
    }
}
