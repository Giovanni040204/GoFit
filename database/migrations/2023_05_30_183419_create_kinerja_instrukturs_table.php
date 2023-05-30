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
        Schema::create('kinerja_instrukturs', function (Blueprint $table) {
            $table->id();
            $table->string('bulan'); 
            $table->string('tahun');
            $table->integer('id_instruktur');
            $table->integer('jumlah_hadir');
            $table->integer('jumlah_libur');
            $table->integer('waktu_terlambat');
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
        Schema::dropIfExists('kinerja_instrukturs');
    }
};
