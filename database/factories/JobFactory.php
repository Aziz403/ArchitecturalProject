<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    
        return [
            'worker_id' => 1,
            'occupation_id' => 1,
            'uniform' => rand(0,1),
            'status' => rand(0,1),
            'start_time' => Carbon::now(),
            'created_at' => Carbon::now(),
        ];
    }

}
