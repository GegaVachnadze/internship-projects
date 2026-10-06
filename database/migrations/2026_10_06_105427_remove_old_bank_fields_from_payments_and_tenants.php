<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table): void {
            $table->dropColumn([
                'payer_iban',
                'bank',
            ]);
        });

        Schema::table('tenants', function (Blueprint $table): void {
            $table->dropColumn([
                'tbc_iban',
                'bog_iban',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table): void {
            $table->string('payer_iban', 34)->nullable();
            $table->string('bank', 20)->nullable();
        });

        Schema::table('tenants', function (Blueprint $table): void {
            $table->string('tbc_iban', 34)->nullable();
            $table->string('bog_iban', 34)->nullable();
        });
    }
};