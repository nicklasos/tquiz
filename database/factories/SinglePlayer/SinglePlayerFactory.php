<?php

declare(strict_types=1);

namespace Database\Factories\SinglePlayer;

use App\Models\SinglePlayer\SinglePlayer;
use App\Models\SinglePlayer\SinglePlayerStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SinglePlayerFactory extends Factory
{
    protected $model = SinglePlayer::class;

    public function definition(): array
    {
        return [
            'temp_user_id' => $this->faker->randomNumber(),
            'question_ids' => $this->faker->word(),
            'status' => SinglePlayerStatus::Playing,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
