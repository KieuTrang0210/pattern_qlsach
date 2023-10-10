<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Book;
use App\Models\Category;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 

        $categories = Category::all();

        for ($i = 0; $i < 60; $i++) { 
            $category = $categories->random();
            Book::create([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'published_date' => $faker->date('Y-m-d', 'now'),
                'quantity' => $faker->numberBetween(0,150),
                'category_id' => $category->id,
            ]);
        };

    }
}
