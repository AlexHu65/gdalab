<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Manuel Alejandro Chavez Nunez',
            'email' => 'alejandrotsu23@gmail.com',
            'email_verified_at' => Carbon::now(),
            'email_token_at' => Carbon::now()->addHour(),
            'token' => \Hash::make('alejandrotsu23@gmail.com' . Carbon::now() . \Str::random(200, 500)),
            'password' => \Hash::make('123456'),
        ]);
    }
}
