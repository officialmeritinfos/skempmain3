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
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_wallet_id')->index('wallet_transactions_user_wallet_id_foreign');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('coin_id');
            $table->string('type', 50);
            $table->string('direction', 20);
            $table->decimal('amount', 36, 18);
            $table->decimal('available_before', 36, 18);
            $table->decimal('available_after', 36, 18);
            $table->decimal('locked_before', 36, 18);
            $table->decimal('locked_after', 36, 18);
            $table->string('reference_type', 80)->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->string('reference', 150)->nullable();
            $table->text('description')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index(['coin_id', 'created_at']);
            $table->index(['reference_type', 'reference_id']);
            $table->index(['user_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
