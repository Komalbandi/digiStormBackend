<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;

class AddressTableSeeder extends Seeder
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
            DB::table('address')->insert([
                'id' => Uuid::generate()->string,
                'contact_id' => $contact->id,
                'type' => $faker->randomElement($array = array('home', 'address')),
                'address' => $faker->address,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
