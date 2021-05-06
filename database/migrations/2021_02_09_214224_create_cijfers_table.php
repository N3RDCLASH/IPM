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
            $table->unsignedBigInteger('student_klas_id');
            $table->foreign('studentklas')->references('id')->on('studentklas');
            $table->unsignedBigInteger('vak');
            $table->foreign('vak')->references('id')->on('vakken');
            $table->integer('periode');
            $table->decimal('cijfer', $precision = 8, $scale = 1);
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
