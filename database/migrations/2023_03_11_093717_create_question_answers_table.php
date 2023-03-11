<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('question_answers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('question_id');
            $table->boolean('is_correct')->default(false);
            $table->text('answer');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('question_answers');
    }
};
