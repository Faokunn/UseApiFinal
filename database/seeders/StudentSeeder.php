<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("students")->insert([
            [
                'studentId' => 'admin',
                'password' => Hash::make('adminnapogi'),
            ],
            [
                'adminID' => '1234',
                'password' => 'admin2',
            ],
        ]);
    }
}
