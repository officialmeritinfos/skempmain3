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
        Schema::table('investments', function (Blueprint $table) {
            $table->foreign(['funding_coin_id'])->references(['id'])->on('coins')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['funding_wallet_id'])->references(['id'])->on('user_wallets')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('investments', function (Blueprint $table) {
            $table->dropForeign('investments_funding_coin_id_foreign');
            $table->dropForeign('investments_funding_wallet_id_foreign');
        });
    }
};
