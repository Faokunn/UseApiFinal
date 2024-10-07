<?php

namespace Database\Seeders;

use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            StudentSeeder::class,
            AdminSeeder::class,
            AnnouncementSeeder::class,
            DepartmentSeeder::class,
            CourseSeeder::class,

            // StudentSeeder::class,
            // UpperUniformSeeder::class,
            // LowerUniformSeeder::class,
            // BooksSeeder::class,
            // IdLaceSeeder::class,
            // RSOSeeder::class,
        ]);
    }
}
