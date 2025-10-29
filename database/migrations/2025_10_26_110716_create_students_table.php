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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('telegram_id')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('is_registered')->default(false);
            $table->string('source')->nullable();
            $table->string('referred_by')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
