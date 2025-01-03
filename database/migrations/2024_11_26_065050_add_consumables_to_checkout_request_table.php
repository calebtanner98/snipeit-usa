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
        Schema::table('checkout_requests', function (Blueprint $table) {
            $table->unsignedInteger('consumable_id')->nullable()->after('accessory_id');
            $table->foreign('consumable_id')->references('id')->on('consumables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkout_requests', function (Blueprint $table) {
            $table->dropForeign(['consumable_id']);
            $table->dropColumn(['consumable_id']);
        });
    }
    
};