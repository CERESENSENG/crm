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
           'name'=>'Graphic Design',
           'department_code'=>'GD',
           'duration'=>'10 weeks',
           'hod_id' => 1,
         
        ],
        [
            'name'=>'Mobile App Development',
            'department_code'=>'MD',
            'duration'=>'12 weeks',
            'hod_id' => 1,
          
        ],
         [
            'name'=>'User Interface/User Experience',
            'department_code'=>'UI/UX',
            'duration'=>'8 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'3D Modelling',
            'department_code'=>'3DM',
            'duration'=>'8 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'3D Animation',
            'department_code'=>'3DA',
            'duration'=>'14 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Digital Marketing',
            'department_code'=>'DM',
            'duration'=>'8 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Website Development',
            'department_code'=>'Web/dev',
            'duration'=>'12 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Cyber Security',
            'department_code'=>'CS',
            'duration'=>'16 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Motion Graphics',
            'department_code'=>'MG',
            'duration'=>'10 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Blockchain Technology',
            'department_code'=>'BT',
            'duration'=>'14 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Sage',
            'department_code'=>'sage',
            'duration'=>'3 days',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Networking',
            'department_code'=>'NET',
            'duration'=>'8 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Artificial Intelligence',
            'department_code'=>'AI',
            'duration'=>'16 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'unknown Programming',
            'department_code'=>'BP',
            'duration'=>'8 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Backend Programming',
            'department_code'=>'BP',
            'duration'=>'8 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Frontend Programming',
            'department_code'=>'FP',
            'duration'=>'8 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Cloud Computing',
            'department_code'=>'CC',
            'duration'=>'12 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Data Science/Analytics',
            'department_code'=>'DSA',
            'duration'=>'12 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Master Microsoft Excel',
            'department_code'=>'MME',
            'duration'=>'4 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Copywriting',
            'department_code'=>'CW',
            'duration'=>'4 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Software Engineering',
            'department_code'=>'SE',
            'duration'=>'14 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'R-Programmig',
            'department_code'=>'RP',
            'duration'=>'8 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Data Visualization Using Microsoft Power BI',
            'department_code'=>'DVMP',
            'duration'=>'6 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Wordpress Web Design',
            'department_code'=>'WWD',
            'duration'=>'4 weeks',
            'hod_id' => 1,
         ],
         [
            'name'=>'Adobe Illustrator',
            'department_code'=>'ADI',
            'duration'=>'10 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>' AutoCad',
            'department_code'=>'AC',
            'duration'=>'8 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Interior Designing',
            'department_code'=>'ID',
            'duration'=>'8 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'IT Auditing',
            'department_code'=>'ITA',
            'duration'=>'12 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Master Python',
            'department_code'=>'MP',
            'duration'=>'16 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Master Javascript',
            'department_code'=>'JS',
            'duration'=>'16 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Data Processing',
            'department_code'=>'DP',
            'duration'=>'8 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Master React',
            'department_code'=>'MR',
            'duration'=>'9 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Master Jquery',
            'department_code'=>'MJ',
            'duration'=>'10 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Master Ajax',
            'department_code'=>'MA',
            'duration'=>'12 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Master Php',
            'department_code'=>'MP',
            'duration'=>'16 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Master C++',
            'department_code'=>'MC',
            'duration'=>'15 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Master C#',
            'department_code'=>'MC#',
            'duration'=>'15 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Master Node.Js',
            'department_code'=>'MA',
            'duration'=>'10 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Master Boostrap',
            'department_code'=>'MB',
            'duration'=>'4 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Master CSS',
            'department_code'=>'MC',
            'duration'=>'10 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Skill Monetizatiom',
            'department_code'=>'SM',
            'duration'=>'3 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Technical Writing',
            'department_code'=>'TW',
            'duration'=>'4 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Video Editing',
            'department_code'=>'VE',
            'duration'=>'8 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'LINUX',
            'department_code'=>'LN',
            'duration'=>'12 weeks',
            'hod_id' => 1,
          
         ],
         [
            'name'=>'Canva',
            'department_code'=>'CV',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'Cryptocurrency Trading',
            'department_code'=>'CT',
            'duration'=>'10 weeks',
            'hod_id' => 1,
          
         ],

        
        
        
        
        
        
        ]);
    }
}
