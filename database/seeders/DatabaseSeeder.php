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
            AdminSeeder::class,
            DepartmentSeeder::class,
            CourseSeeder::class,
            ItemBookSeeder::class,
            StockSeeder::class,
            UniformsSeeder::class,

            // StudentSeeder::class,
            // UpperUniformSeeder::class,
            // LowerUniformSeeder::class,
            // BooksSeeder::class,
            // IdLaceSeeder::class,
            // RSOSeeder::class,
        ]);
    }
}
