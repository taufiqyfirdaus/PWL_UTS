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
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'yuba',
                'name' => 'Dwi Paga Ayuba',
                'email' => 'yuba@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'username' => 'fiqy',
                'name' => 'Taufiqy Firdaus Jatu',
                'email' => 'fiqy@gmail.com',
                'password' => Hash::make('12345678')
            ]
        ]);
    }
}
