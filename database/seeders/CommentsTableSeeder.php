<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use Faker\Factory as FakerFactory;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $faker = FakerFactory::create();




        for ($i = 0; $i < 60; $i++) {
            Comment::create([
                'user_id' => $faker->numberBetween(2, 12),
                'post_id' => $faker->numberBetween(1,18),
                'text' => $faker->sentence,

            ]);
        }
    }
}
