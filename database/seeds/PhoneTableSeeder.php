<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $contacts = DB::table('contact')->get();

        foreach ($contacts as $contact) {
            DB::table('phone')->insert([
                'id' => Uuid::generate()->string,
                'contact_id' => $contact->id,
                'type' => $faker->randomElement($array = array('work', 'home', 'mobile')),
                'phone' => $faker->phoneNumber,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
