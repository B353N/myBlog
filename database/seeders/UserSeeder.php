<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # Define users
        $users = [
            [
                'id' => '1',
                'email' => 'r.slavov.work@gmail.com',
                'name' => 'Rumen Slavov',
                'password' => Hash::make('ParolataMiE1010'),
                'role_id' => '3', // admin
                'created_at' => now()
            ],

        ];

        # Iterate the users
        foreach ($users as $user) {

            # Insert or update the row
            DB::table('users')->upsert($user, ['id'], array_keys($user));
        }
    }
}
