<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Get the current date
        $date = now();

        // Loop over the past 12 months
        for ($i = 0; $i < 12; $i++) {
            // Generate a random number of posts between 30 and 50
            $postsCount = rand(30, 50);

            // Create the posts
            for ($j = 0; $j < $postsCount; $j++) {
                Post::factory()->create([
                    'created_at' => $date->copy()->subMonths($i)->addDays(rand(0, 29))
                ]);
            }
        }
    }
}
