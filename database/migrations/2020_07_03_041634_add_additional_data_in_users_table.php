<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalDataInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('kad_pengenalan')->unique()->nullable();
            $table->string('jawatan')->nullable();
            $table->string('alamat_tempat_bertugas')->nullable();
            $table->string('nama_pasangan')->nullable();
            $table->string('kad_pengenalan_pasangan')->unique()->nullable();
            $table->string('pekerjaan_pasangan')->nullable();
            $table->decimal('gaji',10,2)->nullable();
            $table->string('nama_anak')->nullable();
            $table->string('umur_anak')->nullable();
            $table->string('no_kad_pengenalan_anak')->unique()->nullable();
            $table->decimal('lain_lain_pendapatan_bulanan',10,2)->nullable();
            $table->integer('role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->dropColumn('kad_pengenalan');
            $table->dropColumn('jawatan');
            $table->dropColumn('alamat_tempat_bertugas');$table->dropColumn('name');
            $table->dropColumn('nama_pasangan');$table->dropColumn('name');
            $table->dropColumn('kad_pengenalan_pasangan');$table->dropColumn('name');
            $table->dropColumn('pekerjaan_pasangan');$table->dropColumn('name');
            $table->dropColumn('gaji');
            $table->dropColumn('lain_lain_pendapatan_bulanan');
        });
    }
}
