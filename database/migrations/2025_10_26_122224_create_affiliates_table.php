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
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade')->nullable();
            $table->integer('total_referrals')->nullable();
            $table->integer('converted_referrals')->nullable();
            $table->decimal('total_earnings', 10, 2)->nullable();
            $table->decimal('withdrawn_earnings', 10, 2)->nullable();
            $table->decimal('remaining_balance', 10, 2)->nullable();
            $table->string('referral_code')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliates');
    }
};
