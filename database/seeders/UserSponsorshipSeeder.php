<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $sponsorshipPlans = Sponsorship::all();

        User::all()->each(function ($user) use ($faker, $sponsorshipPlans) {
            $selectedSponsorship = $sponsorshipPlans->random();

            $start_date = $faker->dateTimeBetween('-1 month', 'now');
            $end_date = $start_date->modify("+{$selectedSponsorship->duration_time} days");

            $user->sponsorships()->attach($selectedSponsorship->id, [
                'sponsorship_start_date' => $start_date,
                'sponsorship_end_date' => $end_date
            ]);
        });
    }
}
