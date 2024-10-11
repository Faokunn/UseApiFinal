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
                'adminID' => 'admin',
                'password' => Hash::make('admin'),
            ],
            [
                'adminID' => '12345',
                'password' => Hash::make('12345'),
            ],
        ]);
    }
}
