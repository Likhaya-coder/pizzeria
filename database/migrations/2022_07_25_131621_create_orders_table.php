<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('full_names');
            $table->json('delivery');
            $table->json('food_type');
            $table->json('dish_name');
            $table->json('extra_toppings')->nullable();
            $table->json('removed_toppings')->nullable();
            $table->json('drink_type');
            $table->json('drink_name');
            $table->string('street')->nullable();
            $table->string('town')->nullable();
            $table->string('city')->nullable();
            $table->integer('postalCode')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
