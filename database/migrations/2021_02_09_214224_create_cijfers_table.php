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
            $table->integer('Periode');
            $table->integer('StudentKlasID');
            $table->integer('VakID');
            $table->decimal('Cijfer', $precision = 2, $scale = 1);
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
