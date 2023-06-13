<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('single_players', function (Blueprint $table) {
            $table->id();
            $table->integer('temp_user_id');
            $table->string('question_ids');
            $table->string('status')->default('playing');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('single_players');
    }
};
