<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('game_seeds', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('tournament_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_seeds');
    }
};
