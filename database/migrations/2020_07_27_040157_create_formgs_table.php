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
            $table->string('institusi')->nullable();
            $table->string('alamat_institusi')->nullable();
            $table->decimal('ansuran_bulanan',10,2)->nullable();
            $table->date('tarikh_ansuran')->nullable();
            $table->string('tempoh_pinjaman')->nullable();
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
