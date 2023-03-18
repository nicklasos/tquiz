<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            $table->string('theme_id');

            $table->text('question');

            $table->timestamps();

            $table->index('theme_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
