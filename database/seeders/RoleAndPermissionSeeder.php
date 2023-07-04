<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Permission::truncate();
        Permission::create([
            'name'=>'create_book',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'update_book',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'delete_book',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'show_book',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'create_group',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'update_group',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'delete_group',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'show_group',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'borrow_book',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'show_sidebar',
            'guard_name'=>'web'
        ]);
        Permission::create([ //
            'name'=>'show_header',
            'guard_name'=>'web'
        ]);
        Permission::create([ //
            'name'=>'update_user',
            'guard_name'=>'web'
        ]);
        Permission::create([ //
            'name'=>'delete_user',
            'guard_name'=>'web'
        ]);
        Permission::create([ //
            'name'=>'create_user',
            'guard_name'=>'web'
        ]);
        Permission::create([ //
            'name'=>'assign_admin',
            'guard_name'=>'web'
        ]);
        Permission::create([ //
            'name'=>'expel_admin',
            'guard_name'=>'web'
        ]);
        Permission::create([ //
            'name'=>'delete_message',
            'guard_name'=>'web'
        ]);
        Permission::create([ //
            'name'=>'reade_message',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name' => 'show_reports',
            'guard_name'=> 'web'
        ]);

//        Role::truncate();
        $adminRole = Role::create([
            'name' => 'Admin',
            'guard_name'=>'web'
        ]);
        $userRole = Role::create([
            'name' => 'User',
            'guard_name'=>'web'
        ]);
        $guestRole = Role::create([
           'name' => 'Guest',
            'guard_name'=>'web'
        ]);
        $superAdminRole = Role::create([
           'name' => 'Super_admin',
            'guard_name' => 'web'
        ]);

        $adminRole->givePermissionTo([
            'create_book',
            'update_book',
            'delete_book',
            'show_book',
            'create_group',
            'update_group',
            'delete_group',
            'show_group',
            'show_sidebar',
            'show_header',
            'create_user',
            'show_reports'
        ]);
        $userRole->givePermissionTo([
           'show_book',
            'show_group',
            'borrow_book'
        ]);
        $guestRole->givePermissionTo([
            'show_book',
            'show_group',
        ]);
    }
}
