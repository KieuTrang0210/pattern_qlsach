<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Loan;
use App\Models\Book;
use App\Models\Reader;

class LoanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $readers = Reader::all();
        $books = Book::all();

        for ($i = 0; $i < 60; $i++) { 
            $reader = $readers->random();
            $book = $books->random();

            Loan::create([
                'reader_id' => $reader->id,
                'book_id' => $book->id,
                'borrowed_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                'due_at' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
                'returned_at' => $faker->boolean(80) ? $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d') : null,
            ]);
        };
    }
}
