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
        Schema::create('aktivitas_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('bulan'); 
            $table->string('tahun'); 
            $table->integer('id_kelas');
            $table->integer('id_instruktur');
            $table->integer('jumlah_peserta');
            $table->integer('jumlah_libur');
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
        Schema::dropIfExists('aktivitas_kelas');
    }
};
