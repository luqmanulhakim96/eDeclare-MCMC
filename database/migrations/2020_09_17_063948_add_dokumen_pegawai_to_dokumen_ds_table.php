<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDokumenPegawaiToDokumenDsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumen_ds', function (Blueprint $table) {
          $table->bigInteger('formds_id')->unsigned()->nullable();
          $table->foreign('formds_id')->references('id')->on('formds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokumen_ds', function (Blueprint $table) {
            //
        });
    }
}
