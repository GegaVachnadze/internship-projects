<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tables = ['announcements', 'apartments', 'expenses', 'payments'];

        foreach ($tables as $tableName) {
            if (Schema::hasTable($tableName) && !Schema::hasColumn($tableName, 'neighborhood_id')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->foreignId('neighborhood_id')->nullable()->constrained()->cascadeOnDelete();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = ['announcements', 'apartments', 'expenses', 'payments'];

        foreach ($tables as $tableName) {
            if (Schema::hasTable($tableName) && Schema::hasColumn($tableName, 'neighborhood_id')) {
                Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                    $table->dropForeign([$tableName . '_neighborhood_id_foreign']);
                    $table->dropColumn('neighborhood_id');
                });
            }
        }
    }
};
