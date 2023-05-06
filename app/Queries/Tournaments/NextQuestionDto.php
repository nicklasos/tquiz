<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

class NextQuestionDto
{
    public function __construct(
        public readonly ?int  $number,
        public readonly ?bool $isLast,
    )
    {
    }
}
