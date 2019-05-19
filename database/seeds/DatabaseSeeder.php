<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        // DB::table('users')->insert([
        // 	'id' => '111111111',
        // 	'password' => Hash::make('secret')
        // ]);

        DB::table('apitoken')->insert([
        	'token' => Str::random(20),
        	'active' =>true,
        ]);
    }
}
