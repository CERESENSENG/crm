<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\SoftDeletes;



class Department extends Model
{   use SoftDeletes;
    use HasFactory;
    protected $guarded=[];
   

    public function student(){
     return $this->hasMany(Student::class);
    }

    public function hod(){
        return $this->hasOne(User::class, 'id', 'hod_id',);
    }

    
}
