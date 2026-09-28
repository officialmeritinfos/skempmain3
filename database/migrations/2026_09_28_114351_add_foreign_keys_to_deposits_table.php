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
        Schema::table('deposits', function (Blueprint $table) {
            $table->foreign(['approved_by'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['coin_id'])->references(['id'])->on('coins')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['user_wallet_id'])->references(['id'])->on('user_wallets')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deposits', function (Blueprint $table) {
            $table->dropForeign('deposits_approved_by_foreign');
            $table->dropForeign('deposits_coin_id_foreign');
            $table->dropForeign('deposits_user_wallet_id_foreign');
        });
    }
};
