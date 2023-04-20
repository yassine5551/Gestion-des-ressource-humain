<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "cin" => "vala-" . \Illuminate\Support\Str::random(10),
            "user_id" => \App\Models\User::factory()->create()->id,
            "post_id" => Post::all()->random()->id,
            "salary" => fake()->numberBetween(3000, 10000),
            "adress" => fake()->address,
            "phone" => fake()->phoneNumber,
            "born_date" => fake()->date,
            "hiring_date" => "2022-03-01"
        ];
    }
}
