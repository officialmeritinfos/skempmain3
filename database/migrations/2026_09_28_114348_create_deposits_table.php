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
        Schema::create('deposits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user');
            $table->unsignedBigInteger('coin_id')->nullable()->index('deposits_coin_id_foreign');
            $table->unsignedBigInteger('user_wallet_id')->nullable()->index('deposits_user_wallet_id_foreign');
            $table->string('reference', 100);
            $table->string('amount', 100);
            $table->string('cryptoAmount', 100)->nullable();
            $table->decimal('quoted_price', 36, 18)->nullable();
            $table->decimal('credited_crypto_amount', 36, 18)->nullable();
            $table->string('asset', 100);
            $table->enum('deposit_type', ['crypto', 'bank'])->default('crypto');
            $table->string('details');
            $table->string('transactionHash')->nullable();
            $table->string('paymentRef', 100)->nullable();
            $table->string('paymentProof')->nullable();
            $table->integer('paymentMethod')->nullable();
            $table->integer('methodType')->nullable();
            $table->string('timeOfPayment')->nullable();
            $table->timestamp('credited_at')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable()->index('deposits_approved_by_foreign');
            $table->string('status')->default('2');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
