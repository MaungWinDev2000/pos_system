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
        Schema::create('custom_orders', function (Blueprint $table) {
            $table->id();
            $table->string("customer_uuid");
            $table->string("height");
            $table->string("weight");
            $table->string("shoulder");
            $table->string("bust");
            $table->string("waist");
            $table->string("hips");
            $table->string("thigh");
            $table->string("leg_opening");
            $table->string("phone");
            $table->longText("description");
            $table->string("status");
            $table->string("uuid");
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
        Schema::dropIfExists('custom_orders');
    }
};
