<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('users')->insert([
            'id' => Uuid::generate()->string,
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make('abc123'),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
