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
        # Check if table is empty
        if (DB::table('roles')->get()->count() == 0) {
            DB::table('roles')->insert([
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
            ]);
        }
    }
}
