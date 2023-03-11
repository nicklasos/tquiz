<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();

            $table->integer('questions')->default(6);
            $table->boolean('is_active');
            $table->string('title');
            $table->text('description');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
};
