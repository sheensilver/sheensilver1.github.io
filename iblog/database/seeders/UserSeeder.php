<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>'Phong',
            'username' =>'phonguser',
            'email' =>'phonguser@gmail.com',
            'role' =>'user',
            'password' =>Hash::make(123456789),
        ]);
        User::create([
            'name' =>'Phong',
            'username' =>'phongwriter',
            'email' =>'phongwriter@gmail.com',
            'role' =>'writer',
            'password' =>Hash::make(123456789),
        ]);
        User::create([
            'name' =>'Phong',
            'username' =>'phongmanager',
            'email' =>'phongmanager@gmail.com',
            'role' =>'manager',
            'password' =>Hash::make(123456789),
        ]);
        User::create([
            'name' =>'Phong',
            'username' =>'phongdeptraivcl',
            'email' =>'phonguser@gmail.com',
            'role' =>'admin',
            'password' =>Hash::make(123456789),
        ]);
    }
}
