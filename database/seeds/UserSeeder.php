<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public const USER_COUNT = 1000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < self::USER_COUNT; $i++) {
            $name = Str::random(10);
            DB::table('users')->insert([
                'name' => $name,
                'email' => $name.'@gmail.com',
                'active' => mt_rand(0,1),
            ]);
        }
    }
}
