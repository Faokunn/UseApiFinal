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
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Upper',
                'Size' => 'S',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Upper',
                'Size' => 'M',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Upper',
                'Size' => 'L',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Upper',
                'Size' => 'XL',
                'Stock' => '10',
                'Reserved' => '0',
            ],

            // RSO
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Upper',
                'Size' => 'S',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Upper',
                'Size' => 'S',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Upper',
                'Size' => 'M',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Upper',
                'Size' => 'L',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Rso',
                'Body' => 'Upper',
                'Size' => 'XL',
                'Stock' => '10',
                'Reserved' => '0',
            ],

            // UNIVERSITY
            [
                'Department' => 'CAS',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'University',
                'Body' => 'Upper',
                'Size' => 'S',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAS',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'University',
                'Body' => 'Upper',
                'Size' => 'M',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAS',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'University',
                'Body' => 'Upper',
                'Size' => 'L',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAS',
                'Course' => 'BSIT',
                'Gender' => 'RSO',
                'Type' => 'University',
                'Body' => 'Upper',
                'Size' => 'XL',
                'Stock' => '10',
                'Reserved' => '0',
            ],
        ]);
    }
}
