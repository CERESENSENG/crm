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
           'frequency'=>'Twice a week'
         
        ],
        [
            'name'=>'Mobile App Development',
            'department_code'=>'MD',
            'duration'=>'12 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week'
          
        ],
         [
            'name'=>'User Interface/User Experience',
            'department_code'=>'UI/UX',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Twice a week'
          
         ],
         [
            'name'=>'3D Modelling',
            'department_code'=>'3DM',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Four class weekly'
          
         ],
         [
            'name'=>'3D Animation',
            'department_code'=>'3DA',
            'duration'=>'14 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week'
          
         ],
         [
            'name'=>'Digital Marketing',
            'department_code'=>'DM',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Twice a week'
          
         ],
         [
            'name'=>'Website Development',
            'department_code'=>'Web/dev',
            'duration'=>'12 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week'
          
         ],
         [
            'name'=>'Cyber Security',
            'department_code'=>'CS',
            'duration'=>'16 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Motion Graphics',
            'department_code'=>'MG',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Blockchain Technology',
            'department_code'=>'BT',
            'duration'=>'14 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Sage',
            'department_code'=>'sage',
            'duration'=>'3 days',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Networking',
            'department_code'=>'NET',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Twice a week',
          
         ],
         [
            'name'=>'Artificial Intelligence',
            'department_code'=>'AI',
            'duration'=>'16 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Forex Trading',
            'department_code'=>'FT',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Advance Backend Programming',
            'department_code'=>'BP',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Advance Front-end Programming',
            'department_code'=>'FP',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
            
          
         ],
         [
            'name'=>'Cloud Computing',
            'department_code'=>'CC',
            'duration'=>'12 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Data Science/Analytics',
            'department_code'=>'DSA',
            'duration'=>'12 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Master Microsoft Excel',
            'department_code'=>'MME',
            'duration'=>'4 weeks',
            'hod_id' => 1,
            'frequency'=>'Twice a week',
          
         ],
         [
            'name'=>'Copywriting',
            'department_code'=>'CW',
            'duration'=>'4 weeks',
            'hod_id' => 1,
            'frequency'=>'Twice a week',
          
         ],
         [
            'name'=>'Software Engineering',
            'department_code'=>'SE',
            'duration'=>'7 month',
            'hod_id' => 1,
            'frequency'=>'Four class weekly',
          
         ],
         [
            'name'=>'R-Programmig',
            'department_code'=>'RP',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Twice a week',
          
         ],
         [
            'name'=>'Data Visualization Using Microsoft Power BI',
            'department_code'=>'DVMP',
            'duration'=>'6 weeks',
            'hod_id' => 1,
            'frequency'=>'Twice a week',
          
         ],
         [
            'name'=>'Wordpress Web Design',
            'department_code'=>'WWD',
            'duration'=>'4 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
         ],
         [
            'name'=>'Adobe Illustrator',
            'department_code'=>'ADI',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>' AutoCad',
            'department_code'=>'AC',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Interior Designing',
            'department_code'=>'ID',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'IT Auditing',
            'department_code'=>'ITA',
            'duration'=>'12 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Master Python',
            'department_code'=>'MP',
            'duration'=>'4 months',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Master Javascript',
            'department_code'=>'JS',
            'duration'=>'4 months',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Data Processing',
            'department_code'=>'DP',
            'duration'=>'2 months',
            'hod_id' => 1,
            'frequency'=>'Twice a week',
          
         ],
         [
            'name'=>'Master React',
            'department_code'=>'MR',
            'duration'=>'3 months',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Master Jquery',
            'department_code'=>'MJ',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Master Ajax',
            'department_code'=>'MA',
            'duration'=>'12 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Master Php',
            'department_code'=>'MP',
            'duration'=>'16 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
            
          
         ],
         [
            'name'=>'Master C++',
            'department_code'=>'MC',
            'duration'=>'15 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Master C#',
            'department_code'=>'MC#',
            'duration'=>'15 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Master Node.Js',
            'department_code'=>'MA',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Master Boostrap',
            'department_code'=>'MB',
            'duration'=>'4 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Master CSS',
            'department_code'=>'MC',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Skill Monetizatiom',
            'department_code'=>'SM',
            'duration'=>'3 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Technical Writing',
            'department_code'=>'TW',
            'duration'=>'4 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Video Editing',
            'department_code'=>'VE',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'LINUX',
            'department_code'=>'LN',
            'duration'=>'12 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Canva',
            'department_code'=>'CV',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Cryptocurrency Trading',
            'department_code'=>'CT',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Agile Methodology',
            'department_code'=>'AM',
            'duration'=>'16 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Scrum',
            'department_code'=>'SM',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Kanban',
            'department_code'=>'KB',
            'duration'=>'16 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'JIRA',
            'department_code'=>'JR',
            'duration'=>'16 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Microsoft Project',
            'department_code'=>'MP',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Trello',
            'department_code'=>'TO',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Asana',
            'department_code'=>'CT',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Version Control (e.g, Git)',
            'department_code'=>'VC',
            'duration'=>'6 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Communication Tools',
            'department_code'=>'CTs',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Time Management Skills',
            'department_code'=>'TMS',
            'duration'=>'8 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Linux Administration',
            'department_code'=>'LA',
            'duration'=>'14 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Window Server Administration',
            'department_code'=>'WSA',
            'duration'=>'16 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'MacOS Proficiency',
            'department_code'=>'MCP',
            'duration'=>'14 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Shell Scripting',
            'department_code'=>'CT',
            'duration'=>'12 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Virtualization (e.g, firmware)',
            'department_code'=>'VL',
            'duration'=>'14 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Containerization',
            'department_code'=>'CN',
            'duration'=>'14 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'System Monitoring',
            'department_code'=>'SM',
            'duration'=>'16 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Patch Management',
            'department_code'=>'PM',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Active Directory',
            'department_code'=>'AD',
            'duration'=>'6 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'File System Management',
            'department_code'=>'FSM',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Hardware Diagonistics',
            'department_code'=>'HD',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Software Installation/Configuration',
            'department_code'=>'SIC',
            'duration'=>'4 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Remote Desktop Support',
            'department_code'=>'RDS',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'End-User Training',
            'department_code'=>'EUT',
            'duration'=>'12 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'TroubleShooting Networks',
            'department_code'=>'TSN',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'System Optimization',
            'department_code'=>'SO',
            'duration'=>'6 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Data Recovery',
            'department_code'=>'DR',
            'duration'=>'6 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Malware Removal',
            'department_code'=>'MR',
            'duration'=>'3 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Peripheral Setup',
            'department_code'=>'PS',
            'duration'=>'16 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Disaster Recovery Planning',
            'department_code'=>'DRP',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Geographic Information (GIS)',
            'department_code'=>'GIS',
            'duration'=>'14 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Web Mapping',
            'department_code'=>'WM',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Remote Sensing',
            'department_code'=>'RS',
            'duration'=>'10 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],
         [
            'name'=>'Quantum Computing',
            'department_code'=>'QC',
            'duration'=>'12 weeks',
            'hod_id' => 1,
            'frequency'=>'Thrice a week',
          
         ],

        
        
        
        
        
        
        ]);
    }
}
