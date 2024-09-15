<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("announcements")->insert([
            [
                'department' => 'CITE',
                'body' => 'napaka',
            ],
            [
                'department' => 'CITE',
                'body' => 'bading',
            ],
        ]);
    }
}
