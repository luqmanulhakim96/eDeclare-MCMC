<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasanHodivsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulasan_hodivs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hodiv')->nullable();
            $table->string('no_hodiv')->nullable();
            $table->string('ulasan_hodiv')->nullable();
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
        Schema::dropIfExists('ulasan_hodivs');
    }
}
