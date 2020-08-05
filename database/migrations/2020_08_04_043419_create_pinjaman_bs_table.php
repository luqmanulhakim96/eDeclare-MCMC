<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamanBsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman_bs', function (Blueprint $table) {
            $table->id();
            $table->string('lain_lain_pinjaman')->nullable();
            $table->decimal('pinjaman_pegawai',10,2)->nullable();
            $table->decimal('bulanan_pegawai',10,2)->nullable();
            $table->decimal('pinjaman_pasangan',10,2)->nullable();
            $table->decimal('bulanan_pasangan',10,2)->nullable();
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
        Schema::dropIfExists('pinjaman_bs');
    }
}
