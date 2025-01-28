<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_no')->constrained('e_p_i')->onDelete('cascade');
            $table->string('customer_name');
            $table->string('phone_number');
            $table->string('pan_no');
            $table->string('aadhaar_no');
            $table->text('address');
            $table->decimal('market_value_per_sqyd', 10, 2);
            $table->decimal('price_per_sqyd', 10, 2);
            $table->decimal('price_per_cent', 10, 2);
            $table->decimal('total_plot_value', 10, 2)->nullable();
            $table->decimal('total_market_value', 10, 2)->nullable();
            $table->enum('status', ['Booked', 'Registered']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_details');
    }
};
