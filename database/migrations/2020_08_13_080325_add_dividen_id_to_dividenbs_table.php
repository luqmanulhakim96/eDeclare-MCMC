<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDividenIdToDividenbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dividen_bs', function (Blueprint $table) {
            //
            $table->integer('dividen_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dividen_bs', function (Blueprint $table) {
            //
            $table->dropColumn('dividen_id');
        });
    }
}
