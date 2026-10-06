<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->string('tbc_iban', 34)->nullable();
            $table->string('bog_iban', 34)->nullable();
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->decimal('payment_amount', 10, 2)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropColumn('payment_amount');
        });

        Schema::table('tenants', function (Blueprint $table) {
            $table->dropColumn([
                'tbc_iban',
                'bog_iban',
            ]);
        });
    }
};