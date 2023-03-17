<?php

declare(strict_types=1);

namespace App\Queries\Trivia;

use App\Models\QuestionAnswer;

class QuestionAnswerQuery
{
    public function find(int $id): QuestionAnswer
    {
        return QuestionAnswer::findOrFail($id);
    }
}
