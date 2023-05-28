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
        Schema::create('account_number_response_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_number_response_id');
            $table->string('corporate_id');
            $table->string('username');
            $table->string('atas_nama');
            $table->string('balance');
            $table->string('account_number');
            $table->string('bank_type');
            $table->string('pkg')->nullable();
            $table->integer('login_retry');
            $table->string('date_from');
            $table->string('date_to');
            $table->string('meta')->nullable();
            $table->integer('interval_refresh');
            $table->string('next_queue');
            $table->boolean('is_active');
            $table->integer('in_queue');
            $table->integer('in_progress');
            $table->integer('is_crawling');
            $table->string('recurred_at');
            $table->string('created_at');
            $table->string('token');
            $table->string('bank_id');
            $table->string('label');
            $table->string('last_update');
            $table->string('icon');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_number_response_details');
    }
};
