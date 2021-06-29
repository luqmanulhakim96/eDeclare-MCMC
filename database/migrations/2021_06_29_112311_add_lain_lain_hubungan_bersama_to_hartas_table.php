<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLainLainHubunganBersamaToHartasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hartas', function (Blueprint $table) {
          $table->string('lain_lain_hubungan_bersama')->nullable();

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
          $table->dropColumn('lain_lain_hubungan_bersama');

        });
    }
}
