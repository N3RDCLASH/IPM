<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VakTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $vakken = ["Wiskunde", "Engels", "Nederlands", "ICT-Security"];
        foreach ($vakken as $vak) {
            DB::table('vakken')->insert([
                "vak_naam" => $vak,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
