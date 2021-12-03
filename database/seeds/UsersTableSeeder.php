<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => '大島優人'],
            ['mail' => 'yufalcon.0868-to@ezweb.ne.jp'],
            ['password' => 'yuto'],
            ['bio' => '練習中だよ'],
        ]);
    }
}
