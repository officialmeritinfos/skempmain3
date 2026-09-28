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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user');
            $table->unsignedBigInteger('coin_id')->nullable()->index('withdrawals_coin_id_foreign');
            $table->unsignedBigInteger('user_wallet_id')->nullable()->index('withdrawals_user_wallet_id_foreign');
            $table->string('reference');
            $table->string('amount', 100);
            $table->string('asset', 100);
            $table->string('cryptoAmount', 100)->nullable();
            $table->decimal('quoted_price', 36, 18)->nullable();
            $table->string('details');
            $table->string('transHash')->nullable();
            $table->string('paymentRef', 100)->nullable();
            $table->integer('status')->default(2);
            $table->string('source', 200)->nullable();
            $table->timestamp('locked_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable()->index('withdrawals_approved_by_foreign');
            $table->softDeletes();
            $table->timestamps();
            $table->string('input_unit', 10)->nullable();
            $table->decimal('input_amount', 36, 18)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
