<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusAdminToFormbs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formbs', function (Blueprint $table) {
            //
            $table->string('status')->nullable()->default('Sedang diproses');
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
            //
            $table->dropColumn('status');
        });
    }
}
