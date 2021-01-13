<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalDataToFormcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formcs', function (Blueprint $table) {
          $table->string('nama_pegawai')->nullable();
          $table->string('kad_pengenalan')->nullable();
          $table->string('jawatan')->nullable();
          $table->string('alamat_tempat_bertugas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formcs', function (Blueprint $table) {
          $table->dropColumn('nama_pegawai');
          $table->dropColumn('kad_pengenalan');
          $table->dropColumn('jawatan');
          $table->dropColumn('alamat_tempat_bertugas');
        });
    }
}
