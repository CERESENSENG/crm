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
         
        ],
        [
            'name'=>'Mobile App Development',
            'department_code'=>'MD',
            'duration'=>'12 weeks',
          
        ],
         [
            'name'=>'User Interface/User Experience',
            'department_code'=>'UI/UX',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'3D Modelling',
            'department_code'=>'3DM',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'3D Animation',
            'department_code'=>'3DA',
            'duration'=>'14 weeks',
          
         ],
         [
            'name'=>'Digital Marketing',
            'department_code'=>'DM',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'Website Development',
            'department_code'=>'Web/dev',
            'duration'=>'12 weeks',
          
         ],
         [
            'name'=>'Cyber Security',
            'department_code'=>'CS',
            'duration'=>'16 weeks',
          
         ],
         [
            'name'=>'Motion Graphics',
            'department_code'=>'MG',
            'duration'=>'10 weeks',
          
         ],
         [
            'name'=>'Blockchain Technology',
            'department_code'=>'BT',
            'duration'=>'14 weeks',
          
         ],
         [
            'name'=>'Sage',
            'department_code'=>'sage',
            'duration'=>'3 days',
          
         ],
         [
            'name'=>'Networking',
            'department_code'=>'NET',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'Artificial Intelligence',
            'department_code'=>'AI',
            'duration'=>'16 weeks',
          
         ],
         [
            'name'=>'unknown Programming',
            'department_code'=>'BP',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'Backend Programming',
            'department_code'=>'BP',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'Frontend Programming',
            'department_code'=>'FP',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'Cloud Computing',
            'department_code'=>'CC',
            'duration'=>'12 weeks',
          
         ],
         [
            'name'=>'Data Science/Analytics',
            'department_code'=>'DSA',
            'duration'=>'12 weeks',
          
         ],
         [
            'name'=>'Master Microsoft Excel',
            'department_code'=>'MME',
            'duration'=>'4 weeks',
          
         ],
         [
            'name'=>'Copywriting',
            'department_code'=>'CW',
            'duration'=>'4 weeks',
          
         ],
         [
            'name'=>'Software Engineering',
            'department_code'=>'SE',
            'duration'=>'14 weeks',
          
         ],
         [
            'name'=>'R-Programmig',
            'department_code'=>'RP',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'Data Visualization Using Microsoft Power BI',
            'department_code'=>'DVMP',
            'duration'=>'6 weeks',
          
         ],
         [
            'name'=>'Wordpress Web Design',
            'department_code'=>'WWD',
            'duration'=>'4 weeks',
          
         ],
         [
            'name'=>'Adobe Illustrator',
            'department_code'=>'ADI',
            'duration'=>'10 weeks',
          
         ],
         [
            'name'=>' AutoCad',
            'department_code'=>'AC',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'Interior Designing',
            'department_code'=>'ID',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'IT Auditing',
            'department_code'=>'ITA',
            'duration'=>'12 weeks',
          
         ],
         [
            'name'=>'Master Python',
            'department_code'=>'MP',
            'duration'=>'16 weeks',
          
         ],
         [
            'name'=>'Master Javascript',
            'department_code'=>'JS',
            'duration'=>'16 weeks',
          
         ],
         [
            'name'=>'Data Processing',
            'department_code'=>'DP',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'Master React',
            'department_code'=>'MR',
            'duration'=>'9 weeks',
          
         ],
         [
            'name'=>'Master Jquery',
            'department_code'=>'MJ',
            'duration'=>'10 weeks',
          
         ],
         [
            'name'=>'Master Ajax',
            'department_code'=>'MA',
            'duration'=>'12 weeks',
          
         ],
         [
            'name'=>'Master Php',
            'department_code'=>'MP',
            'duration'=>'16 weeks',
          
         ],
         [
            'name'=>'Master C++',
            'department_code'=>'MC',
            'duration'=>'15 weeks',
          
         ],
         [
            'name'=>'Master C#',
            'department_code'=>'MC#',
            'duration'=>'15 weeks',
          
         ],
         [
            'name'=>'Master Node.Js',
            'department_code'=>'MA',
            'duration'=>'10 weeks',
          
         ],
         [
            'name'=>'Master Boostrap',
            'department_code'=>'MB',
            'duration'=>'4 weeks',
          
         ],
         [
            'name'=>'Master CSS',
            'department_code'=>'MC',
            'duration'=>'10 weeks',
          
         ],
         [
            'name'=>'Skill Monetizatiom',
            'department_code'=>'SM',
            'duration'=>'3 weeks',
          
         ],
         [
            'name'=>'Technical Writing',
            'department_code'=>'TW',
            'duration'=>'4 weeks',
          
         ],
         [
            'name'=>'Video Editing',
            'department_code'=>'VE',
            'duration'=>'8 weeks',
          
         ],
         [
            'name'=>'LINUX',
            'department_code'=>'LN',
            'duration'=>'12 weeks',
          
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
          
         ],

        
        
        
        
        
        
        ]);
    }
}
