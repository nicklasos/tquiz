<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\QuestionAnswer;

class QuestionAnswerQuery
{
    public function find(int $id): QuestionAnswer
    {
        return QuestionAnswer::findOrFail($id);
    }

    public function isAnswered(): bool
    {

    }
}
