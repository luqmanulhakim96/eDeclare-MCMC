<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPekerjaanPasanganToFormbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formbs', function (Blueprint $table) {
          $table->string('pekerjaan_pasangan')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formbs', function (Blueprint $table) {
          $table->dropColumn('pekerjaan_pasangan');

        });
    }
}
