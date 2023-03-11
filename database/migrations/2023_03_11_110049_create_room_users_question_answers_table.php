<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('room_users_question_answers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('room_user_id');
            $table->unsignedBigInteger('question_answer_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_users_question_answers');
    }
};
