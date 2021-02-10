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
            $table->integer('periode');
            $table->integer('student_klas_id');
            $table->integer('vak_id');
            $table->decimal('cijfer', $precision = 2, $scale = 1);
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
