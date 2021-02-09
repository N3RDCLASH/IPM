<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiviteitlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activiteitlog', function (Blueprint $table) {
            $table->id();
            $table->integer('StudentID');
            $table->timestamp('Logdatum')->useCurrent();;
            $table->string('Actienaam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activiteitlog');
    }
}
