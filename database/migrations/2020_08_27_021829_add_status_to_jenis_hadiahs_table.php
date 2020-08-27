<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToJenisHadiahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jenis_hadiahs', function (Blueprint $table) {
            $table->string('status_jenis_hadiah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jenis_hadiahs', function (Blueprint $table) {
            $table->dropColumn('status_jenis_hadiah');
        });
    }
}
