<?php

// Added by USA Team

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeRequestableIdNullableInCheckoutRequests extends Migration
{
    public function up()
    {
        Schema::table('checkout_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('requestable_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('checkout_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('requestable_id')->nullable(false)->change();
        });
    }
}