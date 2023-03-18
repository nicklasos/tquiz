<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('leaderboards', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('temp_user_id');
            $table->boolean('is_main_user')->default(false);
            $table->integer('score')->default(0);
            $table->integer('place')->nullable();

            $table->timestamps();

            $table->index('game_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_users');
    }
};
