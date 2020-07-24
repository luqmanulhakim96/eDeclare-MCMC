<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_gift')->nullable();
            $table->string('nilai_gift')->nullable();
            $table->date('tarikh_diterima')->nullable();
            $table->string('nama_pemberi')->nullable();
            $table->string('alamat_pemberi')->nullable();
            $table->string('hubungan_pemberi')->nullable();
            $table->string('sebab_gift')->nullable();
            $table->string('ulasan_jabatan')->nullable();
            $table->string('gambar_gift')->nullable();
            $table->string('status_gift')->nullable();
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
        Schema::dropIfExists('gifts');
    }
}
