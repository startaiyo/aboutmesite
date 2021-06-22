<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'startaiyo',
                    'password' => Hash::make('startaiyo'),
                    'email' => 'startaiyo@gmail.com',
                    'role' => 5,
                ],
                [
                    'name' => 'ユーザ',
                    'password' => Hash::make('password'),
                    'email' => 'hogehoge@mail.com',
                    'role' => 10,
                ],
            ]);
        \App\Models\User::factory(2)->create();
    }
}
