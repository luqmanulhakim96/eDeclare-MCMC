<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPinjamanIdToPinjamanGsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pinjaman_gs', function (Blueprint $table) {
            //
            $table->integer('pinjaman_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pinjaman_gs', function (Blueprint $table) {
            //
            $table->dropColumn('pinjaman_id');
        });
    }
}
