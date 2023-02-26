<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as f;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\resident>
 */
class residentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {




        $faker = f::create();
        return [
                'name' => $faker->name(),
                'house_number' => rand(1,333) ,
                'phone_number' => $faker -> phoneNumber(),
                'block_id' => Arr::random([1,2,3,4,5,6,7,8]),
                'created_at' => now(),
                'updated_at' => now()

        ];
    }
}
