<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employee_detail')->insert([
            [
                'user_id' => 100,
                'date_of_birth' => '2011-11-11',
                'city' => 'Jogja',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 101,
                'date_of_birth' => '2012-12-12',
                'city' => 'Bantul',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 102,
                'date_of_birth' => '2010-10-10',
                'city' => 'Sleman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 103,
                'date_of_birth' => '2009-09-09',
                'city' => 'Gunung Kidul',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
