<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'nine',
                'email' => 'nine@nine.com',
                'password' => 'ninedayo',
                // 'remember_token' =>　str_random(10)
            ],
            [
                'id' => 2,
                'name' => 'やっきぃ',
                'email' => 'yakki@yaki.com',
                'password' => Hash::make('password'),
                // 'remember_token' =>　str_random(10)
            ]
        ]);
    }
}
