<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formgs', function (Blueprint $table) {
            $table->id();
            $table->date('tarikh_lantikan')->nullable();
            $table->string('nama_perkhidmatan')->nullable();
            $table->string('gelaran')->nullable();
            $table->decimal('gaji_pasangan',10,2)->nullable();
            $table->decimal('jumlah_imbuhan',10,2)->nullable();
            $table->decimal('jumlah_imbuhan_pasangan',10,2)->nullable();
            $table->decimal('sewa',10,2)->nullable();
            $table->decimal('pendapatan_pegawai',10,2)->nullable();
            $table->decimal('pendapatan_pasangan',10,2)->nullable();
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
            $table->string('luas_pertanian')->nullable();
            $table->string('lot_pertanian')->nullable();
            $table->string('mukim_pertanian')->nullable();
            $table->string('negeri_pertanian')->nullable();
            $table->string('luas_perumahan')->nullable();
            $table->string('lot_perumahan')->nullable();
            $table->string('mukim_perumahan')->nullable();
            $table->string('negeri_perumahan')->nullable();
            $table->date('tarikh_diperolehi')->nullable();
            $table->string('luas')->nullable();
            $table->string('lot')->nullable();
            $table->string('mukim')->nullable();
            $table->string('negeri')->nullable();
            $table->string('jenis_tanah')->nullable();
            $table->string('nama_syarikat')->nullable();
            $table->decimal('modal_berbayar',10,2)->nullable();
            $table->decimal('jumlah_unit_saham',10,2)->nullable();
            $table->decimal('nilai_saham',10,2)->nullable();
            $table->string('sumber_kewangan')->nullable();
            $table->string('pengakuan')->nullable();

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
        Schema::dropIfExists('formgs');
    }
}
