<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([KlasTableSeeder::class]);
        $this->call([VakTableSeeder::class]);
        $this->call([RichtingTableSeeder::class]);
        $this->call([PermissionsTableSeeder::class]);
    }
}
