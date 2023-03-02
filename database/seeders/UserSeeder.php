<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug','admin')->first();
        $author = Role::where('slug', 'author')->first();
        $manafeSome = Permission::where('slug','manage-some')->first();
        $manageAll = Permission::where('slug','manage-all')->first();
        $user1 = new User();
        $user1->name = 'Test ';
        $user1->email = 'test@gmail.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($developer);
        $user1->permissions()->attach($createTasks);
        $user2 = new User();
        $user2->name = 'NewTest';
        $user2->email = 'new@gmail.com';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($manager);
        $user2->permissions()->attach($manageUsers);
    }
}