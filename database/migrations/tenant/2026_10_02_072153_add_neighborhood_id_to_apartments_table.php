<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('apartments', 'neighborhood_id')) {
            Schema::table('apartments', function (Blueprint $table) {
                $table->foreignId('neighborhood_id')
                    ->nullable()
                    ->constrained('neighborhoods')
                    ->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('apartments', 'neighborhood_id')) {
            Schema::table('apartments', function (Blueprint $table) {
                $table->dropForeign(['neighborhood_id']);
                $table->dropColumn('neighborhood_id');
            });
        }
    }
};