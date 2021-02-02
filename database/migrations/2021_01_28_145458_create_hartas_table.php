<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHartasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hartas', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_harta')->nullable();
            $table->string('pemilik_harta')->nullable();
            $table->string('hubungan_pemilik')->nullable();
            $table->string('maklumat_harta')->nullable();
            $table->date('tarikh_pemilikan_harta')->nullable();
            $table->integer('bilangan')->nullable();
            $table->decimal('nilai_perolehan',10,2)->nullable();
            $table->string('cara_perolehan')->nullable();
            $table->string('lain_lain')->nullable();
            $table->string('cara_belian')->nullable();
            $table->string('nama_pemilikan_asal')->nullable();
            $table->decimal('jumlah_pinjaman',10,2)->nullable();
            $table->string('institusi_pinjaman')->nullable();
            $table->string('tempoh_bayar_balik')->nullable();
            $table->decimal('ansuran_bulanan',10,2)->nullable();
            $table->date('tarikh_ansuran_pertama')->nullable();
            $table->string('jenis_harta_pelupusan')->nullable();
            $table->string('alamat_asset')->nullable();
            $table->string('no_pendaftaran')->nullable();
            $table->decimal('harga_jualan',10,2)->nullable();
            $table->date('tarikh_lupus')->nullable();
            $table->integer('formbs_id')->nullable();
            $table->date('tarikh_pelupusan')->nullable();
            $table->string('cara_pelupusan')->nullable();
            $table->decimal('nilai_pelupusan',10,2)->nullable();
            $table->integer('formcs_id')->nullable();
            $table->string('status_harta')->nullable();
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
        Schema::dropIfExists('hartas');
    }
}
