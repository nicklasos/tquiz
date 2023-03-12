<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\GameSeed;
use App\Models\TempUser;
use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GameFactory extends Factory
{
    public function definition(): array
    {
        return [
            'status' => $this->faker->word(),
            'score' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}