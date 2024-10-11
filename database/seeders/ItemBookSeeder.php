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
                'SubjectCode' => 'PHA 002',
                'SubjectDesc' => 'Pharmacognosy and Chemistry',
                'Stock' => '10',
                'Reserved' => '0',
            ],
            [
                'Department' => 'CAHS',
                'BookName' => 'SHIT',
                'SubjectCode' => 'RAH',
                'SubjectDesc' => 'test',
                'Stock' => '10',
                'Reserved' => '0',
            ],
        ]);
    }
}
