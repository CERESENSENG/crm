<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Carbon\Carbon;

class Payment extends Model
{
    use HasFactory;
    protected $guarded=[];
 
    public function student(){

        return $this->belongsTo(Student::class);
    }

    public function schedule(){

        return $this->belongsTo(Payment_schedule::class,'schedule_id','id');
    }


     static public function getExistingSchoolFeePayment($student_id)
       {

          return  Payment::where('student_id',$student_id)
                    ->where('status','success')
                    ->first();
       }
}

