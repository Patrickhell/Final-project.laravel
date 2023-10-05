<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsorship;
use App\Models\User;
use Faker\Generator as Faker;
use Carbon\Carbon;

class UserSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $sponsorshipPlans = Sponsorship::all();

        // Loop over user IDs 1 and 5
        foreach ([1, 5] as $userId) {
            $user = User::find($userId);

            if ($user) {  // Making sure the user exists
                $selectedSponsorship = $sponsorshipPlans->random();

                $start_date = Carbon::now();
                $end_date = $start_date->copy()->addSeconds(30);

                $user->sponsorships()->attach($selectedSponsorship->id, [
                    'sponsorship_start_date' => $start_date,
                    'sponsorship_end_date' => $end_date
                ]);
            }
        }
    }
}
