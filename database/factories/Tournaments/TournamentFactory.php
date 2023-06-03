<?php

declare(strict_types=1);

namespace Database\Factories\Tournaments;

use App\Models\Tournaments\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TournamentFactory extends Factory
{
    protected $model = Tournament::class;

    public function definition(): array
    {
        return [
            'is_active' => true,
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'players' => 3,
            'questions' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
