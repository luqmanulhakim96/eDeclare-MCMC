<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_harta');
            $table->string('pemilik_harta');
            $table->string('alamat_harta');
            $table->date('tarikh_pemilikan');
            $table->integer('no_sijil_pendaftaran');
            $table->integer('bilangan');
            $table->decimal('nilai_perolehan',10,2);
            $table->string('cara_perolehan');
            $table->decimal('jumlah_pinjaman',10,2)->nullable();
            $table->string('institusi_pinjaman')->nullable();
            $table->integer('tempoh_bayar_balik')->nullable();
            $table->decimal('ansuran_bulanan',10,2)->nullable();
            $table->date('tarikh_ansuran_pertama')->nullable();
            $table->string('additional_statement')->nullable();
            $table->boolean('pengakuan_admin');
            $table->string('keputusan_urusetia');
            $table->string('keputusan_ketua_bahagian');
            $table->string('status_asset');


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
        Schema::dropIfExists('assets');
    }
}
