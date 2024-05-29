<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([[
           'name'=>'web development',
           'department_code'=>'web dev',
           'duration'=>'4 months',
         
        ],
        [
            'name'=>'Graphics Design',
            'department_code'=>'Gd',
            'duration'=>'3 months',
          
         ]]);
    }
}
