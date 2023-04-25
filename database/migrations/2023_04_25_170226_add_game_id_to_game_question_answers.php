<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('game_question_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('game_id')->after('temp_user_id');
        });
    }

    public function down(): void
    {
        Schema::table('game_question_answers', function (Blueprint $table) {
            $table->dropColumn('game_id');
        });
    }
};
