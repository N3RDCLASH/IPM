<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studenten', function (Blueprint $table) {
            $table->id();
            $table->string('Achternaam');
            $table->string('Voornaam');
            $table->date('Geboortedatum');
            $table->date('Geboorteplaats');
            $table->date('Uitgavedatum');
            $table->date('Vervaldatum');
            $table->decimal('Saldo', $precision = 2, $scale = 2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studenten');
    }
}
