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
        Schema::table('waitlist', function (Blueprint $table) {
            $table->timestamp('closed_at')->nullable()->after('created_at')->comment('Timestamp when the waitlist entry was closed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('waitlist', function (Blueprint $table) {
            $table->dropColumn('closed_at');
        });
    }
};