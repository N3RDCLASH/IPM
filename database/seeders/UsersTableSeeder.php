<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_naam' => 'admin',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'user_naam' => 'student',
            'QRpassword' =>  Hash::make('Joel123456'),
            'pincode' =>  '123456',
            'password' =>  Hash::make('123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $student_id = DB::getPdo()->lastInsertId();

        DB::table('studenten')->insert([
            'voor_naam' => 'Joel',
            'achter_naam' => 'Naarendorp',
            'geboorte_datum' => now(),
            'geboorte_plaats' => 'Paramaribo',
            'uitgave_datum' => now(),
            'verval_datum' => now(),
            'saldo' => 100,
            'user_id' => $student_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
