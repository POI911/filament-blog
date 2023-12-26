<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Factory as FakerFactory;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();




        for ($i = 0; $i < 20; $i++) {
            Post::create([
                'user_id' => $faker->numberBetween(2, 12),
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
            ]);
        }
    }
}
