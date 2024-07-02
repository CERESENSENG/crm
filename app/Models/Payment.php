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

        return $this->belongsTo(student::class);
    }

    public function schedule(){

        return $this->belongsTo(Payment_schedule::class,'schedule_id','id');
    }
}
