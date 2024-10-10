<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UniformsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("itemrsos")->insert([
            // CORPO UPPER
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Upper',
                'Size' => 'SSSS',
                'Stock' => '10',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Upper',
                'Size' => 'S',
                'Stock' => '10',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Upper',
                'Size' => 'M',
                'Stock' => '10',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Upper',
                'Size' => 'L',
                'Stock' => '10',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Upper',
                'Size' => 'XL',
                'Stock' => '10',
            ],
        ]);
    }
}
