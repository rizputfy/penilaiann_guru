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
            $table->id('penilaian_pembelajaran');
            $table->float('nilai', 8, 2);
            $table->bigInteger('pembelajaran_id_jenis_penilaian')->unsigned();
            $table->bigInteger('penilaian_id_penilaians')->unsigned();
            $table->timestamps();
        });
        Schema::table('penilaian_pembelajaran', function (Blueprint $table) {
            $table->foreign('pembelajaran_id_jenis_penilaian')->references('id_jenis_penilaian') ->on('jenis_pembelajaran')
            ->onDelete('cascade')->onUpdate('cascade');
  
            $table->foreign('penilaian_id_penilaians')->references('penilaian') ->on('penilaian')
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
