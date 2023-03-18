<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('game_seed_questions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('game_seed_id');
            $table->unsignedBigInteger('question_id');

            $table->timestamps();

            $table->index(['question_id', 'game_seed_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_seed_questions');
    }
};
