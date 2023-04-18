<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->string('nip');
            $table->string('nama');
            $table->string('alamat');
            $table->bigInteger('unit_id_unit')->unsigned();
            $table->bigInteger('penilaians_id_penilaians')->unsigned();
            $table->bigInteger('jabatan_id_jabatan')->unsigned();
           
            $table->timestamps();
        });
        Schema::table('guru', function (Blueprint $table) {
            $table->foreign('unit_id_unit')->references('unit') ->on('unit')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('penilaians_id_penilaians')->references('penilaian') ->on('penilaian')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('jabatan_id_jabatan')->references('jabatan_struktural') ->on('jabatan_struktural')
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
        Schema::dropIfExists('guru');
    }
}
