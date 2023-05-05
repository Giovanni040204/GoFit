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
        Schema::create('aktivasis', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_transaksi');
            $table->datetime('tanggal_aktivasi');
            $table->date('masa_berlaku_aktivasi');
            $table->integer('id_pegawai');
            $table->integer('id_member');
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
        Schema::dropIfExists('aktivasis');
    }
};
