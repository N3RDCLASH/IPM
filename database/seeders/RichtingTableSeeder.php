<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RichtingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $richtingen = ["ICT", "AV", "WTB"];
        foreach ($richtingen as $richting) {
            DB::table('richtingen')->insert([
                "richting_naam" => $richting,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
