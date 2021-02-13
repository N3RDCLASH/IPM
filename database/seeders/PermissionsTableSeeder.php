<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $admin  = Role::create(['name' => 'admin']);
        
        // services
        Permission::create(['name' => 'create services']);
        Permission::create(['name' => 'edit services']);
        Permission::create(['name' => 'delete services']);
        
        // users
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        
        //saldo
        Permission::create(['name' => 'create saldo']);
        Permission::create(['name' => 'edit saldo']);
        Permission::create(['name' => 'delete saldo']);


        $admin->givePermissionTo([
            'create services', 'edit services', 'delete services',
            'create users', 'edit users', 'delete users',
            'create saldo', 'edit saldo', 'delete saldo',
        ]);

         User::find(1)->assignRole($admin);

        $student= Role::create(['name' => 'student']);
        // $permission = Permission::create(['name' => 'edit services']);

    }
}
