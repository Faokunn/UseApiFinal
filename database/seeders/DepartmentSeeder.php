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
            ],
            [
                'name' => 'CAHS',
                'color' => 'WHITE/GREEN',
                'photo' => '',
            ],
            [
                'name' => 'CEA',
                'color' => 'RED',
                'photo' => '',
            ],
            [
                'name' => 'CMA',
                'color' => 'YELLOW',
                'photo' => '',
            ],
            [
                'name' => 'CELA',
                'color' => 'BLUE',
                'photo' => '',
            ],
            [
                'name' => 'CCJE',
                'color' => 'GRAY',
                'photo' => '',
            ],
            ]);
    }
}
