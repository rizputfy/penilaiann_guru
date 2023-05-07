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
            $table->id();
            $table->float('nilai', 8, 2);
            $table->bigInteger('id_jenis_penilaian')->unsigned();
            $table->timestamps();
        });
        Schema::table('penilaian_pembelajaran', function (Blueprint $table) {
            $table->foreign('id_jenis_penilaian')->references('id') ->on('jenis_pembelajaran')
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
