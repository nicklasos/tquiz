<?php

declare(strict_types=1);

namespace Database\Factories\Tournaments;

use App\Models\Tournaments\GameStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GameFactory extends Factory
{
    public function definition(): array
    {
        return [
            'status' => GameStatus::Playing,
            'score' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
