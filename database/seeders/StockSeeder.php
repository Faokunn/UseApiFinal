<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;


class StockSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("stocks")->insert([
            // CITE
            // BSIT
            [
                'stockName' => 'Corporate',
                'stockPhoto' => 'PLACEHOLDER',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate',
                'stockPhoto' => 'PLACEHOLDER',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => 'PLACEHOLDER',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],

            // CAHS
            // BSN
            [
                'stockName' => 'Corporate',
                'stockPhoto' => 'PLACEHOLDER',
                'Course' => 'BSN',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate',
                'stockPhoto' => 'PLACEHOLDER',
                'Course' => 'BSN',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => 'PLACEHOLDER',
                'Course' => 'BSN',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],

            // BSMLS
            [
                'stockName' => 'Corporate',
                'stockPhoto' => 'PLACEHOLDER',
                'Course' => 'BSMLS',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => 'PLACEHOLDER',
                'Course' => 'BSMLS',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            // BSPHARMA
            // BSPSYCH
            // BSCE
            

            // CEAaa
            // BSCE
            // BSCPE
            // BSECE
            // BSARCHI
            
            // [
            //     'stockName' => 'Corporate',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CEA',
            // ],
            // [
            //     'stockName' => 'RSO',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CEA',
            // ],
            // [
            //     'stockName' => 'University',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CEA',
            // ],
            // [
            //     'stockName' => 'P.E.',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CEA',
            // ],

            // // CMAaa
            // // BSA
            // // BST
            // // BSHM
            // [
            //     'stockName' => 'Corporate',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CMA',
            // ],
            // [
            //     'stockName' => 'RSO',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CMA',
            // ],
            // [
            //     'stockName' => 'University',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CMA',
            // ],
            // [
            //     'stockName' => 'P.E.',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CMA',
            // ],

            // // CELAaa
            // // BSED
            // // BSPOLSCI
            // [
            //     'stockName' => 'Corporate',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CELA',
            // ],
            // [
            //     'stockName' => 'RSO',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CELA',
            // ],
            // [
            //     'stockName' => 'University',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CELA',
            // ],

            // // CCJE
            // // BSCRIM
            // [
            //     'stockName' => 'Corporate',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CCJE',
            // ],
            // [
            //     'stockName' => 'RSO',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CCJE',
            // ],
            // [
            //     'stockName' => 'University',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CCJE',
            // ],
            // // CAS
            // [
            //     'stockName' => 'University',
            //     'stockPhoto' => 'SHS.png',
            //     'Course' => 'CAS',
            // ],
            // [
            //     'stockName' => 'P.E.',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'CAS',
            // ],

            // // SHS
            // [
            //     'stockName' => 'University',
            //     'stockPhoto' => 'SHS.png',
            //     'Course' => 'SHS',
            // ],
            // [
            //     'stockName' => 'P.E.',
            //     'stockPhoto' => 'PLACEHOLDER',
            //     'Course' => 'SHS',
            // ],
        ]);
    }
}