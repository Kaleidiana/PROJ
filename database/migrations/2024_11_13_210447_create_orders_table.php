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
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to the user who made the order
            $table->foreignId('car_id')->constrained()->onDelete('cascade'); // Reference to the car being ordered
            $table->integer('quantity'); // Added quantity field
            $table->decimal('total_price', 10, 2); // Total price of the order
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending'); // Order status
            $table->timestamps(); // Created and updated timestamps
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
