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
                'photo' => '',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'CAHS',
                'color' => 'WHITE',
                'photo' => '',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'CEA',
                'color' => 'RED',
                'photo' => '',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'CMA',
                'color' => 'YELLOW',
                'photo' => '',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'CELA',
                'color' => 'BLUE',
                'photo' => '',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'CCJE',
                'color' => 'GRAY',
                'photo' => '',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'CAS',
                'color' => 'WHITE',
                'photo' => '',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            [
                'name' => 'SHS',
                'color' => 'GREEN',
                'photo' => '',
                'reserved' => '0',
                'claim' => '0',
                'completed' => '0'
            ],
            ]);
    }
}
