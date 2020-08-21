<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUlasanHodToFormdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formds', function (Blueprint $table) {
            //
            $table->string('ulasan_hod')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formds', function (Blueprint $table) {
            //
            $table->dropColumn('ulasan_hod');
        });
    }
}
