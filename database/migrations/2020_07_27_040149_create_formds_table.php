<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formds', function (Blueprint $table) {
            $table->id();
            $table->string('nama_syarikat')->nullable();
            $table->string('no_pendaftaran_syarikat')->nullable();
            $table->string('alamat_syarikat')->nullable();
            $table->string('jenis_syarikat')->nullable();
            $table->decimal('pulangan_tahunan',10,2)->nullable();
            $table->decimal('modal_syarikat',10,2)->nullable();
            $table->decimal('modal_dibayar',10,2)->nullable();
            $table->string('punca_kewangan')->nullable();
            $table->string('nama_ahli')->nullable();
            $table->string('hubungan')->nullable();
            $table->string('jawatan_syarikat')->nullable();
            $table->decimal('jumlah_saham',10,2)->nullable();
            $table->decimal('nilai_saham',10,2)->nullable();
            $table->string('dokumen_syarikat')->nullable();
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
        Schema::dropIfExists('formds');
    }
}
