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
        Schema::create('transfers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reference', 150)->nullable();
            $table->unsignedBigInteger('coin_id')->nullable()->index('transfers_coin_id_foreign');
            $table->unsignedBigInteger('sender_wallet_id')->nullable()->index('transfers_sender_wallet_id_foreign');
            $table->unsignedBigInteger('recipient_wallet_id')->nullable()->index('transfers_recipient_wallet_id_foreign');
            $table->string('amount', 150)->nullable();
            $table->decimal('quoted_price', 36, 18)->nullable();
            $table->decimal('usd_value', 18)->nullable();
            $table->string('recipient', 150)->nullable();
            $table->string('sender', 150)->nullable();
            $table->string('recipientHolder', 150)->nullable();
            $table->integer('status')->default(1);
            $table->string('created_at', 150)->nullable();
            $table->string('updated_at', 150)->nullable();
            $table->string('input_unit', 10)->nullable();
            $table->decimal('input_amount', 36, 18)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
