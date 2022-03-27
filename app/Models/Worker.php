<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;


    protected $fillable = [
        'fname' ,
        'lname' ,
        'photo',
        'phone',
        'id_number',
        'due_date',
        'insurance',
    ];


    public function fullName(){
        return $this->fname . ' ' . $this->lname;
    }

    public function occupation(){
        return $this->belongsTo(Occupation::class);
    }

    public function job(){
        return $this->belongsTo(Job::class);
    }




}
