<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("students")->insert([
            'studentId' => '00-1234-123456',
            'password' => '123456789',
        ]);
    }
}
