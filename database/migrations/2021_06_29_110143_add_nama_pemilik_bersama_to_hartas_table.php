<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaPemilikBersamaToHartasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hartas', function (Blueprint $table) {
            $table->string('nama_pemilik_bersama')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hartas', function (Blueprint $table) {
            $table->dropColumn('nama_pemilik_bersama');
        });
    }
}
