<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('temp_users', function (Blueprint $table) {
            $table->id();

            $table->string('hash');

            $table->string('name');
            $table->string('ip');
            $table->text('user_agent')->nullable();
            $table->text('referer')->nullable();
            $table->text('start_url')->nullable();
            $table->integer('rnd')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temp_users');
    }
};
