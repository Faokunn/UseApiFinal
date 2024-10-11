<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ItemBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("item_books")->insert([
            // CAHS
            // BSPHA
            [
                'Department' => 'CAHS',
                'BookName' => 'Physical Pharmacy and sciences',
                'SubjectCode' => 'PHA 009',
                'SubjectDesc' => 'Pharmacognosy and Chemistry',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAHS',
                'BookName' => 'Phytochemical and Biological',
                'SubjectCode' => 'PHA 302',
                'SubjectDesc' => 'Pharmacognosy and Plant Chemistry',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAHS',
                'BookName' => 'Basic and Clinical Pharmacology',
                'SubjectCode' => 'PHA 042',
                'SubjectDesc' => '15th Edition',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAHS',
                'BookName' => 'Pharmaceutical Calculations 15th Edition',
                'SubjectCode' => 'NUR 001',
                'SubjectDesc' => 'Pharmaceutical Calculations',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAHS',
                'BookName' => 'Medical Surgical Nursing',
                'SubjectCode' => 'NUR 156',
                'SubjectDesc' => 'Suddarth Brunner',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAHS',
                'BookName' => 'Community and Public Health Nursing',
                'SubjectCode' => 'HES 006',
                'SubjectDesc' => 'Melanie Regulations',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAHS',
                'BookName' => 'Strasinger and Lorenzo Urinalysis',
                'SubjectCode' => 'MLS 065',
                'SubjectDesc' => 'For body fluids and alike',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAHS',
                'BookName' => 'Gregorio Histopathologic Techniques',
                'SubjectCode' => 'MLS 043',
                'SubjectDesc' => 'Anatomy',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            


            [
                'Department' => 'CMA',
                'BookName' => 'Basic financial accounting and regulations',
                'SubjectCode' => 'ACC 102',
                'SubjectDesc' => 'Conceptual framework and accounting standards',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CMA',
                'BookName' => 'Managerial economics',
                'SubjectCode' => 'BAM 040',
                'SubjectDesc' => 'Law on obligations and contracts',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CMA',
                'BookName' => 'Income taxation',
                'SubjectCode' => 'FIN 081',
                'SubjectDesc' => 'Financial management',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CMA',
                'BookName' => 'Business taxation',
                'SubjectCode' => 'ACC 111',
                'SubjectDesc' => 'Business law and regulations',
                'Stock' => '10',
                'Reserved' => '0',
            ],

            // CEA

            
            // [
            //     'Department' => '',
            //     'BookName' => '',
            //     'SubjectCode' => '',
            //     'SubjectDesc' => '',
            //     'Status' => '',
            //     'Stock' => '10',
            // ],
            // [
            //     'Department' => '',
            //     'BookName' => '',
            //     'SubjectCode' => '',
            //     'SubjectDesc' => '',
            //     'Status' => '',
            //     'Stock' => '10',
            // ],
            // [
            //     'Department' => '',
            //     'BookName' => '',
            //     'SubjectCode' => '',
            //     'SubjectDesc' => '',
            //     'Status' => '',
            //     'Stock' => '10',
            // ],
            // [
            //     'Department' => '',
            //     'BookName' => '',
            //     'SubjectCode' => '',
            //     'SubjectDesc' => '',
            //     'Status' => '',
            //     'Stock' => '10',
            // ],

        ]);
    }
}
