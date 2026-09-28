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
        Schema::table('swaps', function (Blueprint $table) {
            $table->foreign(['from_coin_id'])->references(['id'])->on('coins')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['from_wallet_id'])->references(['id'])->on('user_wallets')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['to_coin_id'])->references(['id'])->on('coins')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['to_wallet_id'])->references(['id'])->on('user_wallets')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('swaps', function (Blueprint $table) {
            $table->dropForeign('swaps_from_coin_id_foreign');
            $table->dropForeign('swaps_from_wallet_id_foreign');
            $table->dropForeign('swaps_to_coin_id_foreign');
            $table->dropForeign('swaps_to_wallet_id_foreign');
            $table->dropForeign('swaps_user_id_foreign');
        });
    }
};
