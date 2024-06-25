<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            ['item'=>'cohort','value'=> 1],
            ['item'=>'cohort','value'=> 2],
            ['item'=>'cohort','value'=> 3],
            ['item'=>'cohort','value'=> 4],
    
    ]);
    }
}
