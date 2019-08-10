<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('contact')->insert([
                'id' => Uuid::generate()->string,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'dob' => $faker->dateTimeInInterval($startDate = '-30 years', $interval = '+ 5 days', $timezone = null),
                'company_name' => $faker->company,
                'position' => $faker->randomElement($array = array('admin', 'staff')),
                'email' => $faker->companyEmail,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);
        }
    }
}
