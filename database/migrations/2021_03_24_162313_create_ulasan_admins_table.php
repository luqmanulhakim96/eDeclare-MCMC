<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasanAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulasan_admins', function (Blueprint $table) {
            $table->id();
            $table->string('nama_admin')->nullable();
            $table->string('no_admin')->nullable();
            $table->string('ulasan_admin')->nullable();
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
        Schema::dropIfExists('ulasan_admins');
    }
}
