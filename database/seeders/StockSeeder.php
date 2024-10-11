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
            [
                'stockName' => 'Corporate',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CITE',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CITE',
            ],
            [
                'stockName' => 'University',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CITE',
            ],
            [
                'stockName' => 'P.E.',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CITE',
            ],

            // CAHS
            [
                'stockName' => 'Corporate',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CAHS',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CAHS',
            ],
            [
                'stockName' => 'University',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CAHS',
            ],
            [
                'stockName' => 'P.E.',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CAHS',
            ],

            // CEA
            [
                'stockName' => 'Corporate',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CEA',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CEA',
            ],
            [
                'stockName' => 'University',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CEA',
            ],
            [
                'stockName' => 'P.E.',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CEA',
            ],

            // CMA
            [
                'stockName' => 'Corporate',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CMA',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CMA',
            ],
            [
                'stockName' => 'University',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CMA',
            ],
            [
                'stockName' => 'P.E.',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CMA',
            ],

            // CELA
            [
                'stockName' => 'Corporate',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CELA',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CELA',
            ],
            [
                'stockName' => 'University',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CELA',
            ],
            [
                'stockName' => 'P.E.',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CELA',
            ],

            // CELA
            [
                'stockName' => 'Corporate',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CCJE',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CCJE',
            ],
            [
                'stockName' => 'University',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CCJE',
            ],
            [
                'stockName' => 'P.E.',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'CCJE',
            ],

            // SHS
            [
                'stockName' => 'University',
                'stockPhoto' => 'SHS.png',
                'Department' => 'SHS',
            ],
            [
                'stockName' => 'P.E.',
                'stockPhoto' => 'PLACEHOLDER',
                'Department' => 'SHS',
            ],
        ]);
    }
}
