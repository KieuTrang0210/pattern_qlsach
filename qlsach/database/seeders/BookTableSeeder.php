<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 
        for ($i = 0; $i < 60; $i++) { 
            Book::create([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'published_date' => $faker->date('Y-m-d', 'now'),
                'quantity' => $faker->numberBetween(0,150),
            ]);
        };

    }
}
