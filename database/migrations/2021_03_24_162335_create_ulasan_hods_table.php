<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasanHodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulasan_hods', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hod')->nullable();
            $table->string('no_hod')->nullable();
            $table->string('ulasan_hod')->nullable();
            $table->string('formbs_id')->nullable();
            $table->string('formcs_id')->nullable();
            $table->string('formds_id')->nullable();
            $table->string('formgs_id')->nullable();
            $table->string('gift_id')->nullable();
            $table->string('giftb_id')->nullable();
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
        Schema::dropIfExists('ulasan_hods');
    }
}
