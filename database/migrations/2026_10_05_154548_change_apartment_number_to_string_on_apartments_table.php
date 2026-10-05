<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('apartments', function (Blueprint $table): void {
            $table->string('apartment_number')->change();
        });
    }

    public function down(): void
    {
        Schema::table('apartments', function (Blueprint $table): void {
            $table->unsignedInteger('apartment_number')->change();
        });
    }
};