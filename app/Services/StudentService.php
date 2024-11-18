<?php

namespace App\Services;

use App\Models\Student;


class StudentService
{



     public function getStudent($id)
     {
          return Student::find($id);
     }

     public function getStudentByMatric($matric)
     {
          return Student::whereMatricNo($matric)->first();
     }


     public function getStudentByEmail($email)
     {
          return Student::whereEmail($email)->first();
     }


     public function getStudentByAppNo($app)
     {
          return Student::whereAppNo($app)->first();
     }


     public    function store(array $data)
     {

        try {
            return   Student::create($data);
            } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
           }

     }

}
