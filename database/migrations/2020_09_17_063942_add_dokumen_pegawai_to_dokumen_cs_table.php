<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDokumenPegawaiToDokumenCsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumen_cs', function (Blueprint $table) {
          $table->bigInteger('formcs_id')->unsigned()->nullable();
          $table->foreign('formcs_id')->references('id')->on('formcs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokumen_cs', function (Blueprint $table) {
            //
        });
    }
}
