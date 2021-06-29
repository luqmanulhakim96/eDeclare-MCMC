<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisPemilikanBersamaToHartasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hartas', function (Blueprint $table) {
            $table->string('jenis_pemilikan_bersama')->nullable();
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
            $table->dropColumn('jenis_pemilikan_bersama');
        });
    }
}
