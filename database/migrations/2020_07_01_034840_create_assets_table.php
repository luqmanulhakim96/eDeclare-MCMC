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
            $table->string('perakuan')->nullable();
            $table->date('tarikh_perakuan')->nullable();
            $table->string('jenis_harta')->nullable();
            $table->string('pemilik_harta')->nullable();
            $table->string('hubungan_pemilik')->nullable();
            $table->string('maklumat_harta')->nullable();
            $table->date('tarikh_pemilikan_harta')->nullable();
            $table->integer('bilangan')->nullable();
            $table->decimal('nilai_perolehan',10,2)->nullable();
            $table->string('cara_perolehan')->nullable();
            $table->decimal('jumlah_pinjaman',10,2)->nullable();
            $table->string('institusi_pinjaman')->nullable();
            $table->string('tempoh_bayar_balik')->nullable();
            $table->decimal('ansuran_bulanan',10,2)->nullable();
            $table->date('tarikh_ansuran_pertama')->nullable();
            $table->string('additional_statement')->nullable();
            $table->boolean('pengakuan_admin')->nullable();
            $table->string('keputusan_urusetia')->nullable();
            $table->string('keputusan_ketua_bahagian')->nullable();
            $table->string('status_asset')->nullable();


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
