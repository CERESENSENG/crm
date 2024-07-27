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

          
        DB::table('users')->insert([[
            'name'=>'admin',
            'email'=>'info@ceresense.com.ng',
            'phone' => '07063419718',
            'password'=>Hash::make('$cerecode@+2024'),
         
        ]]);
    }

    
}



