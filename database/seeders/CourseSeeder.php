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
            // CITE //
            [
                'courseName' => 'BSIT', //
                'departmentID' => '1',
                'courseDescription' => 'Bachelor of Science in Information Technology'
            ],
            // CAHS //
            [
                'courseName' => 'BSN', //
                'departmentID' => '2',
                'courseDescription' => 'Bachelor of Science in Nursing'
            ],
            [
                'courseName' => 'BSMLS', //
                'departmentID' => '2',
                'courseDescription' => 'Bachelor of Science in Medical Sciences'
            ],
            [
                'courseName' => 'BSPHARMA', //
                'departmentID' => '2',
                'courseDescription' => 'Bachelor of Science in Pharmacy'
            ],
            [
                'courseName' => 'BSPSYCH', //
                'departmentID' => '2',
                'courseDescription' => 'Bachelor of Science in Psychology'
            ],
            // CEA //
            [
                'courseName' => 'BSCE', //
                'departmentID' => '3',
                'courseDescription' => 'Bachelor of Science in Civil Engineering'
            ],
            [
                'courseName' => 'BSCPE', //
                'departmentID' => '3',
                'courseDescription' => 'Bachelor of Science in Computer Engineering'
            ],
            [
                'courseName' => 'BSECE', //
                'departmentID' => '3',
                'courseDescription' => 'Bachelor of Science in Electronic Engineering'
            ],
            [
                'courseName' => 'BSARCHI', //
                'departmentID' => '3',
                'courseDescription' => 'Bachelor of Science in Architecture'
            ],
            // CMA
            [
                'courseName' => 'BSA', //
                'departmentID' => '4',
                'courseDescription' => 'Bachelor of Science in Accounting'
            ],
            [
                'courseName' => 'BST', //
                'departmentID' => '4',
                'courseDescription' => 'Bachelor of Science in Tourism'
            ],
            [
                'courseName' => 'BSHM', //
                'departmentID' => '4',
                'courseDescription' => 'Bachelor of Science in Hospitality Management'
            ],


            // CELA //
            [
                'courseName' => 'BSED', //
                'departmentID' => '5',
                'courseDescription' => 'Bachelor of Science in Education'
            ],
            [
                'courseName' => 'BSPOLSCI', //
                'departmentID' => '5',
                'courseDescription' => 'Bachelor of Science in Political Science'
            ],
            // CCJE //
            [
                'courseName' => 'BSCRIM', //
                'departmentID' => '6',
                'courseDescription' => 'Bachelor of Science in Criminology'
            ],
            // CAS
            [
                'courseName' => 'CAS', //
                'departmentID' => '7',
                'courseDescription' => 'College of Arts and Sciences'
            ],
            // SHS
            [
                'courseName' => 'SHS', //
                'departmentID' => '8',
                'courseDescription' => 'Senior High School'
            ],
            ]);
    }
}
