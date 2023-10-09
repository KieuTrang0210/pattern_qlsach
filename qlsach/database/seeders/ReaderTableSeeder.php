<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Reader;


class ReaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 
        for ($i = 0; $i < 30; $i++) { 
            Reader::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->numerify('##########'),
            ]);
        };

    }
}
