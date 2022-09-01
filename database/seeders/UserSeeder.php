<?php

namespace Database\Seeders;

use DB;
use Hash;
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
        $user = [
            [
                'name'=>"Muhammad",
                'email'=>"muhammadlive7858@gmail.com",
                'password'=>Hash::make('muhammad'),
                'role'=>"DIRECTOR",
                'filial_id'=>1,
                'parent_user_id'=>0
            ],
            [
                'name'=>"abbos",
                'email'=>"abbos@gmail.com",
                'password'=>Hash::make('muhammad'),
                'role'=>"DIRECTOR",
                'filial_id'=>1,
                'parent_user_id'=>1
            ],
            [
                'name'=>"zokir",
                'email'=>"zokir@gmail.com",
                'password'=>Hash::make('muhammad'),
                'role'=>"admin",
                'filial_id'=>1,
                'parent_user_id'=>1
            ]
        ];
        return DB::table('users')->insert($user);
    }
}
