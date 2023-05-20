<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('game_seed_questions', function (Blueprint $table) {
            $table->index('game_seed_id');
        });
    }

    public function down(): void
    {
        Schema::table('game_seed_questions', function (Blueprint $table) {
            $table->dropIndex('game_seed_id');
        });
    }
};
