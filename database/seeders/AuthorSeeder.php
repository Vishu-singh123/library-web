<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table("authors")->insert([
                "name" => $faker->name(), 
                "email" => $faker->email(),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
                // "category_id" => mt_rand(1,10),  
                // "geners_id" => mt_rand(1,10)  
            ]);
        }
    }
}
