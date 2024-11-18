<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Student;
use App\Models\User;



class Department extends Model
{   use SoftDeletes;
    use HasFactory;
    protected $guarded=[];


    public function student(){
     return $this->hasMany(Student::class);
    }

    public function hod(){
        return $this->hasOne(User::class, 'id', 'hod_id');
    }


      static function getDeptByCode($code)
      {
        return Department::where('department_code', $code)->first();
      }





 // toDO



}


