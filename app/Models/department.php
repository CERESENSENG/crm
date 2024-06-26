<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\SoftDeletes;



class department extends Model
{   use SoftDeletes;
    use HasFactory;
    protected $guarded=[];
   

    public function students(){
     return $this->hasMany(student::class);
    }

    public function hod(){
        return $this->hasOne(User::class, 'id', 'hod_id',);
    }
    
}
