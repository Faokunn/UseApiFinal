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
            [
                'stockName' => 'boninam',
                'stockPhoto' => 'BLACK',
                'Department' => 'CITE',
            ],
            [
                'stockName' => 'agkola',
                'stockPhoto' => 'asd',
                'Department' => 'BONINAM',
            ],
        ]);
    }
}
