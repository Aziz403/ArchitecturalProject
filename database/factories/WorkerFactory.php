<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    
        return [
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'phone' => 00 . rand(1,270) . rand(111111111 , 999999999),
            // 'photo' => 'design/defualt_worker.jpg',
            'id_number' => hexdec(uniqid()),
            'due_date' => now(),
            'insurance' => rand(0,1),
            'created_at' => Carbon::now(),
        ];
    }

}
