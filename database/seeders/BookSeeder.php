<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Gener;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table("books")->insert([
                "name" => $faker->name(), 
                "image" => $faker->imageUrl(), 
                'category_id' => $faker->randomElement(Category::pluck('id')),
                'geners_id' => $faker->randomElement(Gener::pluck('id')),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
                // "category_id" => mt_rand(1,10),  
                // "geners_id" => mt_rand(1,10)  
            ]);
        }
    }
}
