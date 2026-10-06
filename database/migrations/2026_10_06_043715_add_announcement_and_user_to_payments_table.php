<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('announcement_id')
                ->nullable()
                ->after('id')
                ->constrained('announcements')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->nullable()
                ->after('announcement_id')
                ->constrained('users')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['announcement_id']);
            $table->dropForeign(['user_id']);

            $table->dropColumn([
                'announcement_id',
                'user_id',
            ]);
        });
    }
};