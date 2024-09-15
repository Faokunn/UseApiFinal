<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("admins")->insert([
            [
                'adminID' => '0000',
                'password' => 'admin',
            ],
            [
                'adminID' => '1234',
                'password' => 'admin2',
            ],
        ]);
    }
}
