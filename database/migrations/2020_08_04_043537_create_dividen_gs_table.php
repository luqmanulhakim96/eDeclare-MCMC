<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDividenGsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dividen_gs', function (Blueprint $table) {
            $table->id();
            $table->string('dividen_1')->nullable();
            $table->decimal('dividen_1_pegawai',10,2)->nullable();
            $table->decimal('dividen_1_pasangan',10,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dividen_bs');
    }
}
