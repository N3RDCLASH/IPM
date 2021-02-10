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
            $table->string('achter_naam');
            $table->string('voor_naam');
            $table->date('geboorte_datum');
            $table->date('geboorte_plaats');
            $table->date('uitgave_datum');
            $table->date('verval_datum');
            $table->decimal('saldo', $precision = 2, $scale = 2);

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
