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
            $table->unsignedInteger('component_id')->nullable()->after('license_id');
            $table->unsignedInteger('accessory_id')->nullable()->after('component_id');
            $table->foreign('accessory_id')->references('id')->on('accessories')->onDelete('cascade');
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkout_requests', function (Blueprint $table) {
            $table->dropForeign(['accessory_id']);
            $table->dropForeign(['component_id']);
            $table->dropColumn(['accessory_id', 'component_id']);
        });
    }
};
