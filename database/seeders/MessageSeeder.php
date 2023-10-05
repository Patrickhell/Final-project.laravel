<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i<10 ; $i++) {
            $newReview = new Message();

            $user = User::inRandomOrder()->first();
            $newReview->user_id = $user->id;

            $newReview->guest_name = ($faker->firstName());
            $newReview->guest_email = ($faker->email());
            $newReview->content= ($faker->paragraph(2));
            $newReview->save();
        }
    }
}
