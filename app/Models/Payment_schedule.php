<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\SoftDeletes;

class Payment_schedule extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function department(){
        return $this->hasOne(department::class, 'id','department_id' );
    }

     protected  $guarded = [];



     static function getScheduleByDept($dept_id, $purpose)
       {

       return   Payment_schedule::where('department_id',$dept_id)
                            ->where('purpose',$purpose)
                             ->first();
                           

       }

   
}
