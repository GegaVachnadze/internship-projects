<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('payments', function (Blueprint $table) {
        $table->dropForeign(['neighborhood_id']);
        $table->dropColumn('neighborhood_id');
    });
}

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('apartment_id')
                ->after('monthly_fee_id')
                ->constrained('apartments')
                ->cascadeOnDelete();

            $table->string('month')->after('amount');
            $table->boolean('is_paid')->default(true)->after('month');
            $table->foreignId('neighborhood_id')
                ->nullable()
                ->after('is_paid')
                ->constrained('neighborhoods')
                ->cascadeOnDelete();

            $table->dropForeign(['monthly_fee_id']);
            $table->dropColumn('monthly_fee_id');
        });
    }
};