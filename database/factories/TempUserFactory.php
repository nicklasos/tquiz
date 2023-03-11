<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Services\TempUserId;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TempUserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'hash' => app(TempUserId::class)->generate(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
