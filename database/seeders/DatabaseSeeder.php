<?php

namespace Database\Seeders;

use App\Models\book;
use App\Models\review;
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
        User::factory(10)->create();
        User::factory()->admin()->create();
        book::factory(10)->create()->each(function($book){
            $review_number = random_int(1,10);
            review::factory()->count($review_number)->good()->for($book)->create();

        });
        book::factory(10)->create()->each(function($book){
            $review_number = random_int(1,10);
            review::factory()->count($review_number)->average()->for($book)->create();

        });
        book::factory(10)->create()->each(function($book){
            $review_number = random_int(1,10);
            review::factory()->count($review_number)->poor()->for($book)->create();

        });

       
    }
}
