<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendapatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendapatans', function (Blueprint $table) {
            $table->id();
            $table->decimal('gaji',10,2);
            $table->decimal('jumlah_imbuhan',10,2);
            $table->decimal('sewa',10,2)->nullable();
            $table->string('jenis_dividen');
            $table->decimal('dividen',10,2);
            $table->decimal('gaji_pasangan',10,2)->nullable();
            $table->decimal('jumlah_imbuhan_pasangan',10,2)->nullable();
            $table->decimal('sewa_pasangan',10,2)->nullable();
            $table->string('jenis_dividen_pasangan')->nullable();
            $table->decimal('dividen_pasangan',10,2)->nullable();
            $table->string('lain_lain_pendapatan')->nullable();
            $table->decimal('jumlah_lain_lain_pendapatan',10,2)->nullable();
            $table->decimal('jumlah_pendapatan',10,2);
            $table->decimal('jumlah_pendapatan_pasangan',10,2);

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
        Schema::dropIfExists('pendapatans');
    }
}
