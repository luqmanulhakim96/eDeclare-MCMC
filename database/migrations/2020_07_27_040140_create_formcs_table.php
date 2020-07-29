<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formcs', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_harta_lupus')->nullable();
            $table->string('pemilik_harta_pelupusan')->nullable();
            $table->string('hubungan_pemilik_pelupusan')->nullable();
            $table->string('no_pendaftaran_harta')->nullable();
            $table->date('tarikh_pemilikan')->nullable();
            $table->date('tarikh_pelupusan')->nullable();
            $table->string('cara_pelupusan')->nullable();
            $table->decimal('nilai_pelupusan',10,2)->nullable();
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
        Schema::dropIfExists('formcs');
    }
}
