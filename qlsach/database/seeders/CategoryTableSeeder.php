<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Science', 'Literature', 'History', 'Computer Science', 'Economics', 'Math'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

    }
}
