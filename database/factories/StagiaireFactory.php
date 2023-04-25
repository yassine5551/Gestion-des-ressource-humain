<?php

namespace Database\Factories;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stagiaire>
 */
class StagiaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "first_name" => fake()->firstName(),
            "last_name" => fake()->lastName(),
            "email" => fake()->email(),
            'date_debut' => Carbon::today(),
            "date_fin" => Carbon::tomorrow(),
            "phone" => fake()->phoneNumber(),
            "project_id" => Project::all()->random()->id,
            "born_date" => fake()->date(),

        ];
    }
}
