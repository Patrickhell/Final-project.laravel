<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        {
            $userIds = User::all()->pluck('id');

            foreach ($userIds as $userId) {
                $newDoctorDetail = new UserDetail();
                $newDoctorDetail->user_id = $userId;
                $newDoctorDetail->birth_date = $faker->date();
                $newDoctorDetail->phone_number = $faker->phoneNumber();
                $newDoctorDetail->work_address = $faker->address();
                $newDoctorDetail->personal_address = $faker->address();
                $newDoctorDetail->performance = $faker->jobTitle();
                $newDoctorDetail->profile_picture = $faker->image();
                $newDoctorDetail->cv_file = $faker->sentence();
                $newDoctorDetail->save();
            }
        }
    }
}
