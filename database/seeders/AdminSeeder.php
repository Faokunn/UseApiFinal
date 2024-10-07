<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("admins")->insert([
            [
                'adminID' => '12345',
                'password' => Hash::make('admin'),
            ],
            [
                'adminID' => '1234',
                'password' => 'admin2',
            ],
        ]);
    }
}
