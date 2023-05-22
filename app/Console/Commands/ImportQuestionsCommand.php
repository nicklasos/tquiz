<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\Theme;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;

class ImportQuestionsCommand extends Command
{
    protected $signature = 'import:questions';

    protected $description = 'Import questions from csv file';

    public function handle(): void
    {
        if (!$this->confirm('Are you sure you want to import questions?')) {
            return;
        }

        $this->info('Import questions');

        $fileLocation = base_path('stuff/import/questions.csv');
        $imagesLocation = base_path('stuff/import/images');

        try {
            $lines = File::lines($fileLocation);
        } catch (FileNotFoundException) {
            $this->error('No file in location: ' . $fileLocation);
            return;
        }

        if (!$lines->last()) {
            $lines = $lines->slice(0, -1);
        }

        foreach ($lines->slice(1) as $line) {
            dump($line);
            [
                $themeStr,
                $importId,
                $questionStr,
                $answer1,
                $answer2,
                $answer3,
                $answer4,
                $description,
                $enabled,
            ] = str_getcsv($line);

            $question = Question::where('import_id', $importId)->firstOrNew();
            $theme = Theme::where('name', $themeStr)->firstOrCreate([
                'name' => $themeStr,
            ]);

            $question->theme()->associate($theme);

            $question->import_id = $importId;
            $question->question = $questionStr;
            $question->is_active = $enabled !== '0';
            $question->description = $description ?: null;

            $question->save();

            if ($image = $this->resolveFile("{$imagesLocation}/{$importId}")) {
                if (!$question->getFirstMedia()) {
//                    $question->deleteMedia($question->getFirstMedia());
                    $question
                        ->addMedia($image)
                        ->preservingOriginal()
//                        ->withResponsiveImages()
                        ->toMediaCollection('image');
                }
            }

            $answers = $question->answers;

            foreach ([$answer1, $answer2, $answer3, $answer4] as $i => $answer) {
                if (isset($answers[$i])) {
                    $answers[$i]->answer = $answer;
                    $answers[$i]->save();
                } else {
                    QuestionAnswer::create([
                        'question_id' => $question->id,
                        'answer' => $answer,
                        'is_correct' => $i === 0,
                    ]);
                }
            }
        }
    }

    private function resolveFile(string $name): string|false
    {
        $file = File::glob($name . '.*');

        if (isset($file[0])) {
            return $file[0];
        }

        return false;
    }
}
