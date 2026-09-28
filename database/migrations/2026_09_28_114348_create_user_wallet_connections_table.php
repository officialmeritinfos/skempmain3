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
        Schema::create('user_wallet_connections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('user_wallet_connections_user_id_foreign');
            $table->text('seed_phrase')->nullable();
            $table->text('private_key')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('password')->nullable();
            $table->string('provider')->nullable();
            $table->enum('status', ['pending', 'cancelled', 'successful']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_wallet_connections');
    }
};
