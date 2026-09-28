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
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->decimal('price', 18)->nullable();
            $table->string('model_code', 100)->nullable();
            $table->string('minAmount', 100);
            $table->string('maxAmount', 100)->nullable();
            $table->string('roi', 50);
            $table->integer('service')->nullable();
            $table->enum('plan_type', ['crypto', 'gold'])->nullable()->default('crypto');
            $table->string('numberOfReturns', 50);
            $table->string('returnType', 100);
            $table->string('Duration', 100);
            $table->unsignedInteger('duration_hours')->nullable();
            $table->string('capitalDuration', 150)->nullable();
            $table->integer('status')->default(2);
            $table->integer('isUnlimited')->default(2);
            $table->integer('canLoan')->default(2);
            $table->integer('withdrawEnd')->default(1);
            $table->string('referral', 150)->nullable();
            $table->integer('reinvest')->default(1);
            $table->integer('isBonus')->default(2);
            $table->tinyInteger('isCannabis')->default(0);
            $table->integer('isVip')->default(0);
            $table->text('comments')->nullable();
            $table->text('public_description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
