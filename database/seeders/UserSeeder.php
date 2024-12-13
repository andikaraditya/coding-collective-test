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
        DB::table('users')->insert([
            [
                'id' => 100,
                'name' => 'Rendra',
                'email' => 'rendragituloh@gmail.com',
                'password' => Hash::make('password'),
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 101,
                'name' => 'Khariz',
                'email' => 'Kharizajaah@gmail.com',
                'password' => Hash::make('password'),
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 102,
                'name' => 'Joko',
                'email' => 'Jokoterdepan@gmail.com',
                'password' => Hash::make('password'),
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 103,
                'name' => 'Mariyam',
                'email' => 'Maiyamyuk@gmail.com',
                'password' => Hash::make('password'),
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
