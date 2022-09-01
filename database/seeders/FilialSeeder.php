<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class FilialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filial = [
            [
                'name'=>"Asosiy",
                'description'=>"Uzb",
                'user_id'=>1
            ]
        ];
        return DB::table('filials')->insert($filial);
    }
}
