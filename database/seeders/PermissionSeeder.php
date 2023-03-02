<?php

namespace Database\Seeders;
use App\Models\Permission;
use Illuminate\Database\Seeder;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageAll = new Permission();
        $manageAll->name = 'Manage all';
        $manageAll->slug = 'manage-all';
        $manageAll->save();
        $manageSome = new Permission();
        $manageSome->name = 'manage-some';
        $manageSome->slug = 'manage-some';
        $manageSome->save();
    }
}