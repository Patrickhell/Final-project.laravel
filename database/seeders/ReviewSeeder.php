<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i<7; $i++) {
            $newReview = new Review();
            $newReview->user_id = 1; // Specifically for the admin user
            $newReview->guest_name = $faker->firstName();
            $newReview->guest_email = $faker->email();
            $newReview->title= ucfirst($faker->unique()->words(5 , true));
            $newReview->content = $faker->paragraph(4);
            $newReview->created_at = $faker->dateTimeBetween('-1 month', 'now'); // Random timestamp within the last month
            $newReview->save();
        }

        for ($i=0; $i<50 ; $i++) {

            $newReview = new Review();

            $user = User::inRandomOrder()->first();
            $newReview->user_id = $user->id;

            $newReview->guest_name = $faker->firstName();
            $newReview->guest_email = $faker->email();
            $newReview->title= ucfirst($faker->unique()->words(5 , true));
            $newReview->content= $faker->paragraph(5);
            $newReview->save();
        }
    }
}
