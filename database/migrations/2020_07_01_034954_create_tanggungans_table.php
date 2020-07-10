<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggungans', function (Blueprint $table) {
            $table->id();
            $table->decimal('jumlah_pinjaman_perumahan',10,2)->nullable();
            $table->decimal('jumlah_pinjaman_kenderaan',10,2)->nullable();
            $table->decimal('jumlah_cukai_pendapatan',10,2)->nullable();
            $table->decimal('jumlah_pinjaman_koperasi',10,2)->nullable();
            $table->string('lain_lain_pinjaman')->nullable();
            $table->decimal('jumlah_lain_lain_pinjaman',10,2)->nullable();
            $table->decimal('bulanan_pinjaman_perumahan',10,2)->nullable();
            $table->decimal('bulanan_pinjaman_kenderaan',10,2)->nullable();
            $table->decimal('bulanan_cukai_pendapatan',10,2)->nullable();
            $table->decimal('bulanan_pinjaman_koperasi',10,2)->nullable();
            $table->string('bulanan_lain_pinjaman')->nullable();
            $table->decimal('bulanan_lain_lain_pinjaman',10,2)->nullable();
            $table->decimal('jumlah_pinjaman_perumahan_pasangan',10,2)->nullable();
            $table->decimal('jumlah_pinjaman_kenderaan_pasangan',10,2)->nullable();
            $table->decimal('jumlah_cukai_pendapatan_pasangan',10,2)->nullable();
            $table->decimal('jumlah_pinjaman_koperasi_pasangan',10,2)->nullable();
            $table->string('lain_lain_pinjaman_pasangan')->nullable();
            $table->decimal('jumlah_lain_lain_pinjaman_pasangan',10,2)->nullable();
            $table->decimal('bulanan_pinjaman_perumahan_pasangan',10,2)->nullable();
            $table->decimal('bulanan_pinjaman_kenderaan_pasangan',10,2)->nullable();
            $table->decimal('bulanan_cukai_pendapatan_pasangan',10,2)->nullable();
            $table->decimal('bulanan_pinjaman_koperasi_pasangan',10,2)->nullable();
            $table->string('bulanan_lain_pinjaman_pasangan')->nullable();
            $table->decimal('bulanan_lain_lain_pinjaman_pasangan',10,2)->nullable();
            $table->decimal('jumlah_pinjaman',10,2)->nullable();
            $table->decimal('jumlah_pinjaman_bulanan',10,2)->nullable();
            $table->decimal('jumlah_pinjaman_pasangan',10,2)->nullable();
            $table->decimal('jumlah_pinjaman_bulanan_pasangan',10,2)->nullable();
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
        Schema::dropIfExists('tanggungans');
    }
}
