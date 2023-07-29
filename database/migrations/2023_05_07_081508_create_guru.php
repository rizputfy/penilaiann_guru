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
            $table->id();
            $table->string('nip');
            $table->string('nama');
            $table->string('alamat');
            // $table->string('user_id');
            $table->bigInteger('id_unit')->unsigned();
            $table->bigInteger('id_jabatan_struktural')->unsigned();
            $table->timestamps();
        });

        Schema::table('guru', function (Blueprint $table) {
            $table->foreign('id_unit')->references('id') ->on('unit')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_jabatan_struktural')->references('id') ->on('jabatan_struktural')
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
