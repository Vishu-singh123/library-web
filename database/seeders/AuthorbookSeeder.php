<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table("author_book")->insert([
                'author_id' => $i,
                'book_id' => $i,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ]);
        }
    }
}
