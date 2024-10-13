<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("departments")->insert([ // YUNG MGA COLORS PALITAN KO NALANG SA HULI PATI NA DIN YUNG PHOTO
            [
                'name' => 'CITE',
                'color' => 'BLACK',
                'photo' => 'CITE.jpg',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'CAHS',
                'color' => 'WHITE',
                'photo' => 'CAHS.jpg',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'CEA',
                'color' => 'RED',
                'photo' => 'CEA.jpg',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'CMA',
                'color' => 'YELLOW',
                'photo' => 'CMA.jpg',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'CELA',
                'color' => 'BLUE',
                'photo' => 'CELA.jpg',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'CCJE',
                'color' => 'GRAY',
                'photo' => 'CCJE.jpg',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'CAS',
                'color' => 'WHITE',
                'photo' => 'CAS.jpg',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'SHS',
                'color' => 'GREEN',
                'photo' => 'SHS.jpg',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            ]);
    }
}
