
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
        return $this->belongsTo(Department::class,);

    }

    public function payment(){

        return $this->hasMany(Payment::class,);
    }





    //  todo
}