<?php

namespace App;
use Timer;

use Illuminate\Support\Facades\Route;

class Custom{

    public static function checkTimer(){

        $route = Route::current();
        if($route->getName() == 'jobs.store'){

            $timer = Timer::timerStart('start_job');

            return $timer;

        }else{

            $timer = Timer::timerRead('start_job');

            return $timer;

        }

    }


}
