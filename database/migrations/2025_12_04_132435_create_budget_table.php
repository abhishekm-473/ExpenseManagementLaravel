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
        Schema::create('budget', function (Blueprint $table) {
            $table->increments('budget_id');
            $table->foreignId('user_id');
            $table->double('monthly_food_budget');
            $table->double('monthly_transport_budget');
            $table->double('monthly_entertainment_budget');
            $table->double('monthly_bills_budget');
            $table->double('daily_food_budget');
            $table->double('daily_transport_budget');
            $table->double('daily_entertainment_budget');
            $table->double('daily_bills_budget');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget');
    }
};
