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
            $table->date('tarikh_pemilikan');
            $table->date('tarikh_pelupusan');
            $table->string('status_pelupusan');
            $table->decimal('nilai_pelupusan',10,2);
            $table->string('keputusan_pelupusan');
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
