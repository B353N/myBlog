<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # Define roles
        $roles = [
            [
                'id' => 1,
                'name' => 'user',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'author',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'admin',
                'created_at' => now(),
            ],

        ];

        # Iterate the roles
        foreach ($roles as $role) {

            # Insert or update the row
            DB::table('roles')->upsert($role, ['id'], array_keys($role));
        }
    }
}
