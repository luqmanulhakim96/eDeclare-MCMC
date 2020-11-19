<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalDataToFormgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formgs', function (Blueprint $table) {
          $table->string('nama_pegawai')->nullable();
          $table->string('kad_pengenalan')->nullable();
          $table->string('jawatan')->nullable();
          $table->string('alamat_tempat_bertugas')->nullable();
          $table->decimal('gaji',10,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formgs', function (Blueprint $table) {
          $table->dropColumn('nama_pegawai');
          $table->dropColumn('kad_pengenalan');
          $table->dropColumn('jawatan');
          $table->dropColumn('alamat_tempat_bertugas');$table->dropColumn('name');
          $table->dropColumn('gaji');
        });
    }
}
