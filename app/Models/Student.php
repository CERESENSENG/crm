<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Department;
use App\Models\Payment;

class Student extends Model
{    use SoftDeletes;
    use HasFactory;

    protected $guarded = [];


    public function department(){
        return $this->belongsTo(Department::class);

    }

    public function payment(){

        return $this->hasMany(Payment::class);
    }

    static public function genAppNo($year){



        // COMMENT: more code added to make it more unique
        // $num = rand(10000, 99999); // Generate a random 5-digit number
        $uniq = substr(hexdec(uniqid()), -4);
        $num =   strval(rand(1000, 9999));   // Generate a random 4-digit number
        $str =  str_shuffle($num . $uniq);
        //  str_shuffle($str);

      return   'APP/' . $year . '/' . $str;

    }


    static public function generateAppNo($year){



        // COMMENT: more code added to make it more unique
        // $num = rand(10000, 99999); // Generate a random 5-digit number
        $uniq = substr(hexdec(uniqid()), -4);
        $num =   strval(rand(1000, 9999));   // Generate a random 4-digit number
        $str =  str_shuffle($num . $uniq);
        //  str_shuffle($str);

      return   'APP' . $year . '' . $str;

    }




    static public function checkEmail($email){

    $chkEmail =  Student::where('email',$email)->exists();

    return $chkEmail;


    }





    //  todo
}
