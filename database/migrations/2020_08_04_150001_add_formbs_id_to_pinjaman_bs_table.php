<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormbsIdToPinjamanBsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pinjaman_bs', function (Blueprint $table) {
            //
            $table->bigInteger('formbs_id')->unsigned()->nullable();
            $table->foreign('formbs_id')->references('id')->on('formbs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pinjaman_bs', function (Blueprint $table) {
            //
            $table->dropColumn('formbs_id');
        });
    }
}
