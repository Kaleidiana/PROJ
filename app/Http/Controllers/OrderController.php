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
            $table->foreignId('car_id') // Reference to the Car model
                  ->constrained()  // Automatically adds a foreign key constraint
                  ->onDelete('cascade'); // If a car is deleted, the order should be deleted as well
            $table->string('customer_name'); // Name of the customer
            $table->string('customer_email'); // Customer's email address
            $table->integer('quantity'); // Number of cars ordered
            $table->decimal('total_price', 8, 2); // Total price of the order
            $table->timestamps(); // For created_at and updated_at timestamps
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
