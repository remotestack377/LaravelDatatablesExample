<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $gender = $faker->randomElement(['male', 'female']);

    	foreach (range(1,150) as $index) {
            DB::table('employees')->insert([
                'name' => $faker->name($gender),
                'email' => $faker->email,
                'phone' => $faker->phoneNumber
            ]);
        }
    }
}