<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'per_hour'];


    public function jobs(){
        return $this->hasMany(Job::class);
    }


    public function workers(){
        return $this->hasMany(Worker::class);
    }
    

}
