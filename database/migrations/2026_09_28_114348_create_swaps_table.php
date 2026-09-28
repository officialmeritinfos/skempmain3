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
        Schema::create('swaps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('from_wallet_id')->index('swaps_from_wallet_id_foreign');
            $table->unsignedBigInteger('to_wallet_id')->index('swaps_to_wallet_id_foreign');
            $table->unsignedBigInteger('from_coin_id');
            $table->unsignedBigInteger('to_coin_id')->index('swaps_to_coin_id_foreign');
            $table->string('reference', 150)->unique();
            $table->string('input_unit', 10);
            $table->decimal('input_amount', 36, 18);
            $table->decimal('from_amount', 36, 18);
            $table->decimal('to_amount', 36, 18);
            $table->decimal('from_price', 36, 18);
            $table->decimal('to_price', 36, 18);
            $table->decimal('usd_value', 18);
            $table->integer('status')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->index(['from_coin_id', 'to_coin_id']);
            $table->index(['user_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('swaps');
    }
};
