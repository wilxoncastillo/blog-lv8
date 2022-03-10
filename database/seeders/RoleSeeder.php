<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.admin.categories.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.admin.categories.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.admin.categories.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.admin.categories.destroy'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'admin.admin.tags.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.admin.tags.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.admin.tags.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.admin.tags.destroy'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'admin.admin.posts.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.admin.posts.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.admin.posts.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.admin.posts.destroy'])->syncRoles([$role1, $role2]);


    }
}
