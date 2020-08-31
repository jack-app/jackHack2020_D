<?php

use Illuminate\Database\Seeder;

class StonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stones')->insert([
            [
                'user_id' => 1,
                'stone_name' => 'test1',
                'hp' => 40,
                'attack' =>  20,
                'defence' => 40,
                'color' => 1
            ],
            [
                'user_id' => 2,
                'stone_name' => 'test2',
                'hp' => 60,
                'attack' =>  50,
                'defence' => 10,
                'color' => 0
            ]
        ]);
    }
}
