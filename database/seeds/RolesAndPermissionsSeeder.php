<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachePermissions();

        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'create orders']);
        Permission::create(['name' => 'list orders']);
        Permission::create(['name' => 'edit orders']);
        // Permission::create(['name' => 'create orders'],
        //     ['name' => 'list orders'],
        //     ['name' => 'edit orders'],
        //     ['name' => 'list routes'],
        //     ['name' => 'create routes'],
        //     ['name' => 'edit routes'],
        //     ['name' => 'delete routes'],
        // );

        $role = Role::create(['name' => 'owner']);
        $role->givePermissionTo(['create users', 'edit users', 'delete users', 'create orders', 'list orders', 'edit orders']);
    }
}
