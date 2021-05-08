<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $klassen = ["1.06.11", "1.06.21", "2.06.11", "2.06.21", "3.06.11", "3.06.21", "4.06.11", "4.06.21"];
        foreach ($klassen as $klas) {
            DB::table('klassen')->insert([
                "klas" => $klas,
                "richting_id" => 1,
                "jaar" => "2020-2021",
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
