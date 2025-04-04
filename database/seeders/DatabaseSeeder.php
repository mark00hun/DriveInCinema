<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Screening;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        Movie::factory(5)->create()->each(function ($movie) {
            Screening::factory(3)->create(['movie_id' => $movie->id]);
        });
    }
}
