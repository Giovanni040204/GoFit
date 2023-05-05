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
        Schema::create('deposit_regulers', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_depositR');
            $table->dateTime('tanggal_depositR');
            $table->integer('bayar_depositR');
            $table->integer('bonus_depositR');
            $table->integer('sisa_depositR');
            $table->integer('total_depositR');
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
        Schema::dropIfExists('deposit_regulers');
    }
};
