<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < UserSeeder::USER_COUNT * 6; $i++) {
            $faker = Faker\Factory::create();
            $date = $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
            DB::table('user_accesses')->insert([
                'user_id' => mt_rand(1,UserSeeder::USER_COUNT),
                'last_login' => $date,
            ]);
        }
    }
}
