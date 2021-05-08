<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCijfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cijfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentklas_id');
            $table->unsignedBigInteger('vak_id');
            $table->foreign('studentklas_id')->references('id')->on('studentklas');
            $table->foreign('vak_id')->references('id')->on('vakken');
            $table->integer('periode');
            $table->decimal('cijfer', $precision = 8, $scale = 1);
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
        Schema::dropIfExists('cijfers');
    }
}
