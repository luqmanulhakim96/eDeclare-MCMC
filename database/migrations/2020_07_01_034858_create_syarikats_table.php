<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyarikatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syarikats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_syarikat');
            $table->integer('no_pendaftaran');
            $table->string('alamat_syarikat');
            $table->string('jenis_syarikat');
            $table->decimal('income_tahunan',10,2);
            $table->decimal('modal_syarikat',10,2);
            $table->decimal('paid_up_capital',10,2);
            $table->string('punca_kewangan');
            $table->string('ahli_perniagaan');
            $table->string('hubungan_ahli');
            $table->string('jawatan_ahli');
            $table->decimal('jumlah_saham_ahli',10,2);
            $table->decimal('nilai_saham_ahli',10,2);
            $table->boolean('pengakuan_admin');
            $table->string('keputusan_urusetia');
            $table->string('keputusan_ketua_bahagian');
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
        Schema::dropIfExists('syarikats');
    }
}
