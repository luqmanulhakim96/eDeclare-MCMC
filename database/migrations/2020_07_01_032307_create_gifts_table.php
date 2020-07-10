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
            $table->string('jenis_gift');
            $table->decimal('nilai_gift',10,2);
            $table->date('tarikh_diterima');
            $table->string('nama_pemberi');
            $table->string('alamat_pemberi');
            $table->string('hubungan_pemberi');
            $table->string('sebab_gift');
            $table->string('ulasan_jabatan');
            $table->string('keputusan_gift');
            $table->string('status_gift');
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
