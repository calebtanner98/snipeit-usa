<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('license_seats', function (Blueprint $table) {
            $table->integer('checkout_request_id')->unsigned()->nullable();
            $table->foreign('checkout_request_id')->references('id')->on('checkout_requests')->onDelete('cascade');
        });

        Schema::table('accessories_checkout', function (Blueprint $table) {
            $table->integer('checkout_request_id')->unsigned()->nullable(); 
            $table->foreign('checkout_request_id')->references('id')->on('checkout_requests')->onDelete('cascade');
        });

        Schema::table('assets', function (Blueprint $table) {
            $table->integer('checkout_request_id')->unsigned()->nullable(); 
            $table->foreign('checkout_request_id')->references('id')->on('checkout_requests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('license_seats', function (Blueprint $table) {
            $table->dropForeign(['checkout_request_id']);
            $table->dropColumn('checkout_request_id');
        });

        Schema::table('accessories_checkout', function (Blueprint $table) {
            $table->dropForeign(['checkout_request_id']);
            $table->dropColumn('checkout_request_id');
        });

        Schema::table('assets', function (Blueprint $table) {
            $table->dropForeign(['checkout_request_id']);
            $table->dropColumn('checkout_request_id');
        });
    }
};