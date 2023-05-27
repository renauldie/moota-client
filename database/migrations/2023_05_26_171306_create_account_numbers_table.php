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
        Schema::create('account_numbers', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active');
            $table->string('account_number');
            $table->string('name_holder');
            $table->string('password');
            $table->string('username');
            $table->string('bank_type');
            $table->string('corporate_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_numbers');
    }
};
