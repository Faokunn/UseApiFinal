<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("courses")->insert([
            // CITE
            [
                'name' => 'BSIT',
                'department_id' => '1',
            ],
            // CAHS
            [
                'name' => 'BSN',
                'department_id' => '2',
        
            ],
            [
                'name' => 'BSMLS',
                'department_id' => '2',
            ],
            [
                'name' => 'BSPHARMA',
                'department_id' => '2',
            ],
            [
                'name' => 'BSPSYCH',
                'department_id' => '2',
            ],
            // CEA
            [
                'name' => 'BSCE',
                'department_id' => '3',
            ],
            [
                'name' => 'BSCPE',
                'department_id' => '3',
            ],
            [
                'name' => 'BSECE',
                'department_id' => '3',
            ],
            // CMA
            [
                'name' => 'BSA',
                'department_id' => '4',
            ],
            [
                'name' => 'BST',
                'department_id' => '4',
            ],
            [
                'name' => 'BSHM',
                'department_id' => '4',
            ],
            // CELA
            [
                'name' => 'BSED',
                'department_id' => '5',
            ],
            [
                'name' => 'BSPOLSCI',
                'department_id' => '5',
            ],
            // CCJE
            [
                'name' => 'BSCRIM',
                'department_id' => '6',
            ],
            ]);
    }
}
