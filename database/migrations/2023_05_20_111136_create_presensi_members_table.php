<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi_members', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_presensi');
            $table->dateTime('tanggal_presensi');
            $table->integer('id_member');
            $table->integer('id_jadwalHarian');
            $table->integer('id_depositReguler');
            $table->integer('id_depositKelas');             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi_members');
    }
};
