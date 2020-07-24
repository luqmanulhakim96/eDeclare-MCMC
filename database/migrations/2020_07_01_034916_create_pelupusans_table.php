<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelupusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelupusans', function (Blueprint $table) {
            $table->id();
            $table->date('tarikh_pemilikan')->nullable();
            $table->date('tarikh_pelupusan')->nullable();
            $table->string('status_pelupusan')->nullable();
            $table->string('cara_pelupusan')->nullable();
            $table->decimal('nilai_pelupusan',10,2)->nullable();
            $table->string('keputusan_pelupusan')->nullable();
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
        Schema::dropIfExists('pelupusans');
    }
}
