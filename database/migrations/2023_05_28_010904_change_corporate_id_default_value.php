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
        Schema::table('account_numbers', function (Blueprint $table) {
            $table->string('corporate_id')->default(' ')->nullable()->change();
            $table->string('account_number')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('account_numbers', function (Blueprint $table) {
        });
    }
};
