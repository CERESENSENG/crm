<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{    use SoftDeletes;
    use HasFactory;
  
    protected $guarded = [];
    

    public function department(){

        return $this->belongsTo(department::class);
    }
    public function payment(){

        return $this->hasMany(payment::class,);
    }
}
