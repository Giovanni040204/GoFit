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
        Schema::create('pendapatan_bulanans', function (Blueprint $table) {
            $table->id();
            $table->string('bulan'); 
            $table->string('tahun');
            $table->integer('aktivasi');
            $table->integer('deposit');
            $table->integer('total');           
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
        Schema::dropIfExists('pendapatan_bulanans');
    }
};
