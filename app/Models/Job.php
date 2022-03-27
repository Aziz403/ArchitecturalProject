<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Job extends Model
{

    use HasFactory;


    protected $fillable = [
        'worker_id' ,
        'occupation_id' ,
        'uniform' ,
        'status' ,
        'note',
        'start_time',
        'end_time',
        'amount'
    ];


    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i'
    ];

    public function worker(){
        return $this->belongsTo(Worker::class);
    }

    public function occupation(){
        return $this->belongsTo(Occupation::class);
    }



}
