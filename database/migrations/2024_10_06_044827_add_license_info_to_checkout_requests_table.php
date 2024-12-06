<?php

// Added by USA Team

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
            $table->unsignedInteger('license_id')->nullable()->after('requestable_id');
            $table->integer('seats_requested')->nullable()->after('license_id');
            $table->foreign('license_id')->references('id')->on('licenses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkout_requests', function (Blueprint $table) {
            $table->dropForeign(['license_id']);
            $table->dropColumn(['license_id', 'seats_requested']);
        });
    }
};