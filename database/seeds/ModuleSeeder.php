<?php

use App\Module;
use App\UserLevelCredential;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            ['code' => '01', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'Dashboard', 'action' => 'dashboard', 'icon' => 'la la-dashboard'],
            ['code' => '02', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'Modules', 'action' => 'module', 'icon' => 'la la-folder'],
            ['code' => '03', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'User Level', 'action' => 'user_level', 'icon' => 'la la-users'],
            ['code' => '04', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'User', 'action' => 'user', 'icon' => 'la la-user'],
            ['code' => '05', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'Media', 'action' => 'media', 'icon' => 'la la-image'],
            ['code' => '06', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'Slider', 'action' => 'slider', 'icon' => 'la la-image'],
            ['code' => '07', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'Setting', 'action' => 'setting', 'icon' => 'la la-cogs'],
            ['code' => '08', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'Content', 'action' => 'content', 'icon' => 'la la-folder'],
            ['code' => '09', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'Category', 'action' => 'post_category', 'icon' => 'la la-tag'],
            ['code' => '10', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'Post', 'action' => 'post', 'icon' => 'la la-file'],
            ['code' => '11', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'Featured Post', 'action' => 'featured_post', 'icon' => 'la la-folder'],
            ['code' => '12', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'Service', 'action' => 'service', 'icon' => 'la la-tag'],
            ['code' => '13', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'Client', 'action' => 'client', 'icon' => 'la la-user'],
            ['code' => '14', 'parent_code' => '#', 'type' => 'Menu', 'name' => 'Partner', 'action' => 'partner', 'icon' => 'la la-user'],
        ];
        Module::insert($modules);
        foreach ($modules as $key => $module) {
            UserLevelCredential::create([
                'user_level_id' => 1,
                'module_id' => ($key+1),
                'is_allowed' => 1
            ]);
        }
    }
}
