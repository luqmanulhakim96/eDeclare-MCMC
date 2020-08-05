<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formbs', function (Blueprint $table) {
            $table->id();
            $table->decimal('gaji_pasangan',10,2)->nullable();
            $table->decimal('jumlah_imbuhan',10,2)->nullable();
            $table->decimal('jumlah_imbuhan_pasangan',10,2)->nullable();
            $table->decimal('sewa',10,2)->nullable();
            $table->decimal('sewa_pasangan',10,2)->nullable();
            $table->decimal('pinjaman_perumahan_pegawai',10,2)->nullable();
            $table->decimal('bulanan_perumahan_pegawai',10,2)->nullable();
            $table->decimal('pinjaman_perumahan_pasangan',10,2)->nullable();
            $table->decimal('bulanan_perumahan_pasangan',10,2)->nullable();
            $table->decimal('pinjaman_kenderaan_pegawai',10,2)->nullable();
            $table->decimal('bulanan_kenderaan_pegawai',10,2)->nullable();
            $table->decimal('pinjaman_kenderaan_pasangan',10,2)->nullable();
            $table->decimal('bulanan_kenderaan_pasangan',10,2)->nullable();
            $table->decimal('jumlah_cukai_pegawai',10,2)->nullable();
            $table->decimal('bulanan_cukai_pegawai',10,2)->nullable();
            $table->decimal('jumlah_cukai_pasangan',10,2)->nullable();
            $table->decimal('bulanan_cukai_pasangan',10,2)->nullable();
            $table->decimal('jumlah_koperasi_pegawai',10,2)->nullable();
            $table->decimal('bulanan_koperasi_pegawai',10,2)->nullable();
            $table->decimal('jumlah_koperasi_pasangan',10,2)->nullable();
            $table->decimal('bulanan_koperasi_pasangan',10,2)->nullable();
            $table->decimal('jumlah_pinjaman_pegawai',10,2,10,2)->nullable();
            $table->decimal('jumlah_bulanan_pegawai',10,2)->nullable();
            $table->decimal('jumlah_pinjaman_pasangan',10,2)->nullable();
            $table->decimal('jumlah_bulanan_pasangan',10,2)->nullable();
            $table->string('jenis_harta')->nullable();
            $table->string('pemilik_harta')->nullable();
            $table->string('hubungan_pemilik')->nullable();
            $table->string('maklumat_harta')->nullable();
            $table->date('tarikh_pemilikan_harta')->nullable();
            $table->integer('bilangan')->nullable();
            $table->decimal('nilai_perolehan',10,2)->nullable();
            $table->string('cara_perolehan')->nullable();
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
        Schema::dropIfExists('formbs');
    }
}
