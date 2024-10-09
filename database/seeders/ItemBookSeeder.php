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
            [
                'Department' => 'CITE',
                'BookName' => 'BLACK',
                'SubjectCode' => 'TAMGA',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
            [
                'Department' => 'CITE',
                'BookName' => 'SHIT',
                'SubjectCode' => 'RAH',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
            [
                'Department' => 'CITE',
                'BookName' => 'BLACK',
                'SubjectCode' => 'TAMGA',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
            [
                'Department' => 'CITE',
                'BookName' => 'SHIT',
                'SubjectCode' => 'RAH',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
            [
                'Department' => 'CITE',
                'BookName' => 'BLACK',
                'SubjectCode' => 'TAMGA',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
            [
                'Department' => 'CITE',
                'BookName' => 'SHIT',
                'SubjectCode' => 'RAH',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
            [
                'Department' => 'CITE',
                'BookName' => 'BLACK',
                'SubjectCode' => 'TAMGA',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
            [
                'Department' => 'CITE',
                'BookName' => 'SHIT',
                'SubjectCode' => 'RAH',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
            [
                'Department' => 'CITE',
                'BookName' => 'BLACK',
                'SubjectCode' => 'TAMGA',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
            [
                'Department' => 'CITE',
                'BookName' => 'SHIT',
                'SubjectCode' => 'RAH',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
            [
                'Department' => 'CITE',
                'BookName' => 'BLACK',
                'SubjectCode' => 'TAMGA',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
            [
                'Department' => 'CITE',
                'BookName' => 'SHIT',
                'SubjectCode' => 'RAH',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
            [
                'Department' => 'CCJE',
                'BookName' => 'BLACK',
                'SubjectCode' => 'bading',
                'SubjectDesc' => 'test',
                'Status' => 'IDK',
                'Stock' => '1',
            ],
        ]);
    }
}
