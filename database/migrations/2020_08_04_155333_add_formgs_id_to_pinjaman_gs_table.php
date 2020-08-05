<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormgsIdToPinjamanGsTable extends Migration
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
            $table->bigInteger('formgs_id')->unsigned()->nullable();
            $table->foreign('formgs_id')->references('id')->on('formgs');
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
            $table->dropColumn('formgs_id');
        });
    }
}
