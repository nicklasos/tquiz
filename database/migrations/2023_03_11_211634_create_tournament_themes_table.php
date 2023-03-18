<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tournament_themes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('theme_id');

            $table->timestamps();

            $table->index(['theme_id', 'tournament_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tournament_themes');
    }
};
