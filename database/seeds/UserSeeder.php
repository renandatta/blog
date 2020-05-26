<?php

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
        $userLevel = \App\UserLevel::create([
            'name' => 'SuperAdmin',
        ]);
        \App\User::create([
            'user_level_id' => $userLevel->id,
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password')
        ]);
    }
}
