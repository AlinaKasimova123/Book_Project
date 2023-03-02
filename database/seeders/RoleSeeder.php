<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'Admin';
        $admin->slug = 'admin';
        $admin->save();
        $author = new Role();
        $author->name = 'Author';
        $author->slug = 'author';
        $author->save();
    }
}