<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaitlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waitlist', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->constrained()->onDelete('cascade'); 
            $table->integer('requestable_id')->nullable();
            $table->integer('license_id')->nullable();
            $table->integer('quantity')->default(1);
            $table->timestamp('canceled_at')->nullable();
            $table->softDeletes();
            $table->integer('accessory_id')->nullable();
            $table->integer('component_id')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waitlist');
    }
}