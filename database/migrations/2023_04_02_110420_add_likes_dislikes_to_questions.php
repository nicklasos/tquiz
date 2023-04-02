<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->integer('dislikes')->default(0)->after('description');
            $table->integer('likes')->default(0)->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropCOlumn('dislikes');
            $table->dropCOlumn('likes');
        });
    }
};
