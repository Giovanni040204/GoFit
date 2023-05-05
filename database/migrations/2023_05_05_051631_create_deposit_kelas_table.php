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
        Schema::create('deposit_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_depositK');
            $table->dateTime('tanggal_depositK');
            $table->date('masa_berlaku_depositK');
            $table->string('jenis_depositK');
            $table->integer('jumlah_depositK');
            $table->integer('bonus_depositK');
            $table->integer('bayar_depositK');
            $table->integer('sisa_depositK');
            $table->integer('id_pegawai');
            $table->integer('id_member');
            $table->integer('id_kelas');               
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
        Schema::dropIfExists('deposit_kelas');
    }
};
