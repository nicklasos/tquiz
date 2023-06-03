<?php

declare(strict_types=1);

namespace Database\Factories\Tournaments;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LeaderboardFactory extends Factory
{
    public function definition(): array
    {
        return [
            'score' => $this->faker->randomNumber(),
            'place' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
