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
            // CITE
            // CORPO Shirt
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
                'Size' => 'SSSS',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
                'Size' => 'S',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
                'Size' => 'M',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
                'Size' => 'L',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
                'Size' => 'XL',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            //CORPO Pants
            // CORPO Shirt
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
                'Size' => 'YES',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
                'Size' => 'S',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
                'Size' => 'M',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
                'Size' => 'L',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
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
                'Body' => 'Shirt',
                'Size' => 'S',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
                'Size' => 'S',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
                'Size' => 'M',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
                'Size' => 'L',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CITE',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Rso',
                'Body' => 'Shirt',
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
                'Body' => 'Shirt',
                'Size' => 'S',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAS',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'University',
                'Body' => 'Shirt',
                'Size' => 'M',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAS',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'University',
                'Body' => 'Shirt',
                'Size' => 'L',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAS',
                'Course' => 'BSIT',
                'Gender' => 'RSO',
                'Type' => 'University',
                'Body' => 'Shirt',
                'Size' => 'XL',
                'Stock' => '10',
                'Reserved' => '0',
            ],
        ]);
    }
}
