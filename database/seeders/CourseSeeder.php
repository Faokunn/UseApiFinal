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
                'courseName' => 'BSIT',
                'departmentID' => '1',
                'courseDescription' => 'Bachelor of Science information Technology'
            ],
            // CAHS
            [
                'courseName' => 'BSN',
                'departmentID' => '2',
                'courseDescription' => 'Bachelor of Science in Nursing'
            ],
            [
                'courseName' => 'BSMLS',
                'departmentID' => '2',
                'courseDescription' => 'Bachelor of Science'
            ],
            [
                'courseName' => 'BSPHARMA',
                'departmentID' => '2',
                'courseDescription' => 'Bachelor of Science'
            ],
            [
                'courseName' => 'BSPSYCH',
                'departmentID' => '2',
                'courseDescription' => 'Bachelor of Science'
            ],
            // CEA
            [
                'courseName' => 'BSCE',
                'departmentID' => '3',
                'courseDescription' => 'Bachelor of Science'
            ],
            [
                'courseName' => 'BSCPE',
                'departmentID' => '3',
                'courseDescription' => 'Bachelor of Science'
            ],
            [
                'courseName' => 'BSECE',
                'departmentID' => '3',
                'courseDescription' => 'Bachelor of Science'
            ],
            // CMA
            [
                'courseName' => 'BSA',
                'departmentID' => '4',
                'courseDescription' => 'Bachelor of Science'
            ],
            [
                'courseName' => 'BST',
                'departmentID' => '4',
                'courseDescription' => 'Bachelor of Science'
            ],
            [
                'courseName' => 'BSHM',
                'departmentID' => '4',
                'courseDescription' => 'Bachelor of Science'
            ],
            // CELA
            [
                'courseName' => 'BSED',
                'departmentID' => '5',
                'courseDescription' => 'Bachelor of Science'
            ],
            [
                'courseName' => 'BSPOLSCI',
                'departmentID' => '5',
                'courseDescription' => 'Bachelor of Science'
            ],
            // CCJE
            [
                'courseName' => 'BSCRIM',
                'departmentID' => '6',
                'courseDescription' => 'Bachelor of Science'
            ],
            ]);
    }
}
