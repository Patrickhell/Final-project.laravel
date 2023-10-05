<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $votes = [
            '1' , '2' , '3' , '4' , '5'
        ];

        foreach ($votes as $vote) {
            $newVote = new Vote();

            $user = User::inRandomOrder()->first();
            $newVote->user_id = $user->id;

            $newVote->vote = $vote  ;
            $newVote->save();
        }
    }
}
