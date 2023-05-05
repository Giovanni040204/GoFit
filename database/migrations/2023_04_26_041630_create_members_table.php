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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_member');
            $table->string('nama_member');
            $table->string('email_member');
            $table->string('telepon_member');
            $table->string('jenis_kelamin_member');
            $table->date('tanggal_lahir_member');
            $table->string('alamat_member');
            $table->integer('id_aktivasi');
            $table->string('username');
            $table->string('password');
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
        Schema::dropIfExists('members');
    }
};
