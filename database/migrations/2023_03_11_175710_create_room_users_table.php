<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('room_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('temp_user_id');
            $table->integer('score')->default(0);
            $table->integer('place')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_users');
    }
};
