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
                'Course' => 'BSPHA',
                'Department' => 'CAHS',
                'BookName' => 'Physical Pharmacy and sciences',
                'SubjectCode' => 'PHA 009',
                'SubjectDesc' => 'Pharmacognosy and Chemistry',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Course' => 'BSPHA',
                'Department' => 'CAHS',
                'BookName' => 'Phytochemical and Biological',
                'SubjectCode' => 'PHA 302',
                'SubjectDesc' => 'Pharmacognosy and Plant Chemistry',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Course' => 'BSPHA',
                'Department' => 'CAHS',
                'BookName' => 'Basic and Clinical Pharmacology',
                'SubjectCode' => 'PHA 042',
                'SubjectDesc' => '15th Edition',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Course' => 'BSPHA',
                'Department' => 'CAHS',
                'BookName' => 'Pharmaceutical Calculations 15th Edition',
                'SubjectCode' => 'NUR 001',
                'SubjectDesc' => 'Pharmaceutical Calculations',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            // BSN
            [
                'Course' => 'BSN',
                'Department' => 'CAHS',
                'BookName' => 'Medical Surgical Nursing',
                'SubjectCode' => 'NUR 156',
                'SubjectDesc' => 'Suddarth Brunner',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Course' => 'BSN',
                'Department' => 'CAHS',
                'BookName' => 'Community and Public Health Nursing',
                'SubjectCode' => 'HES 006',
                'SubjectDesc' => 'Melanie Regulations',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            // BSMLS
            [
                'Course' => 'BSMLS',
                'Department' => 'CAHS',
                'BookName' => 'Strasinger and Lorenzo Urinalysis',
                'SubjectCode' => 'MLS 065',
                'SubjectDesc' => 'For body fluids and alike',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Course' => 'BSMLS',
                'Department' => 'CAHS',
                'BookName' => 'Gregorio Histopathologic Techniques',
                'SubjectCode' => 'MLS 043',
                'SubjectDesc' => 'Anatomy',
                'Stock' => '10',
                'Reserved' => '0',
            ],

            // BSA
            [
                'Course' => 'BSA',
                'Department' => 'CAHS',
                'BookName' => 'Conceptual framework and accounting standards',
                'SubjectCode' => 'ACC 102',
                'SubjectDesc' => 'Basic financial accounting and regulations',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Course' => 'BSA',
                'Department' => 'CMA',
                'BookName' => 'Managerial economics',
                'SubjectCode' => 'BAM 040',
                'SubjectDesc' => 'Law on obligations and contracts',
                'Stock' => '10',
                'Reserved' => '0',
            ],

            [
                'Course' => 'BSA',
                'Department' => 'CMA',
                'BookName' => 'Income taxation',
                'SubjectCode' => 'FIN 081',
                'SubjectDesc' => 'Financial management',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            

            [
                'Course' => 'Business taxation',
                'Department' => 'CMA',
                'BookName' => 'ACC 111',
                'SubjectCode' => 'ACC 111',
                'SubjectDesc' => 'Business law and regulations',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            

            // CEA
            //CE
            [
                'Course' => 'BSCE',
                'Department' => 'CEA',
                'BookName' => 'Applied Calculus',
                'SubjectCode' => 'CAL 021',
                'SubjectDesc' => 'Variations for Engineers',
                'Stock' => '10',
                'Reserved' => '0',
            ],

            [
                'Course' => 'BSCE',
                'Department' => 'CEA',
                'BookName' => 'Tensor Calculus',
                'SubjectCode' => 'CAL 203',
                'SubjectDesc' => 'Simplified tools and Techniques',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Course' => 'BSCE',
                'Department' => 'CEA',
                'BookName' => 'Advanced Calculus',
                'SubjectCode' => 'CAL 223',
                'SubjectDesc' => 'Applications in physics and Chemistry',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            // BSCPE

            [
                'Course' => 'BSCPE',
                'Department' => 'CEA',
                'BookName' => 'Applied Calculus',
                'SubjectCode' => 'CAL 021',
                'SubjectDesc' => 'Variations for Engineers',
                'Stock' => '10',
                'Reserved' => '0',
            ],

            [
                'Course' => 'BSCPE',
                'Department' => 'CEA',
                'BookName' => 'Tensor Calculus',
                'SubjectCode' => 'CAL 203',
                'SubjectDesc' => 'Simplified tools and Techniques',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Course' => 'BSCPE',
                'Department' => 'CEA',
                'BookName' => 'Advanced Calculus',
                'SubjectCode' => 'CAL 223',
                'SubjectDesc' => 'Applications in physics and Chemistry',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            // BSECE
            [
                'Course' => 'BSECE',
                'Department' => 'CEA',
                'BookName' => 'Applied Calculus',
                'SubjectCode' => 'CAL 021',
                'SubjectDesc' => 'Variations for Engineers',
                'Stock' => '10',
                'Reserved' => '0',
            ],

            [
                'Course' => 'BSECE',
                'Department' => 'CEA',
                'BookName' => 'Tensor Calculus',
                'SubjectCode' => 'CAL 203',
                'SubjectDesc' => 'Simplified tools and Techniques',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Course' => 'BSECE',
                'Department' => 'CEA',
                'BookName' => 'Advanced Calculus',
                'SubjectCode' => 'CAL 223',
                'SubjectDesc' => 'Applications in physics and Chemistry',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            //BS ARCHI
            [
                'Course' => 'BSARCHI',
                'Department' => 'CEA',
                'BookName' => 'Applied Calculus',
                'SubjectCode' => 'CAL 021',
                'SubjectDesc' => 'Variations for Engineers',
                'Stock' => '10',
                'Reserved' => '0',
            ],

            [
                'Course' => 'BSARCHI',
                'Department' => 'CEA',
                'BookName' => 'Tensor Calculus',
                'SubjectCode' => 'CAL 203',
                'SubjectDesc' => 'Simplified tools and Techniques',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Course' => 'BSARCHI',
                'Department' => 'CEA',
                'BookName' => 'Advanced Calculus',
                'SubjectCode' => 'CAL 223',
                'SubjectDesc' => 'Applications in physics and Chemistry',
                'Stock' => '10',
                'Reserved' => '0',
            ],

        ]);
    }
}
