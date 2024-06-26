<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class department extends Model
{
    use HasFactory;
    protected $guarded=[];
   

    public function students(){
     return $this->hasMany(student::class);
    }

    public function user(){
        return $this->belongsTo(user::class, 'hod_id');
    }
    
}
