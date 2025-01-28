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
        Schema::create('plot_level_i', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->integer('total_plots');
            $table->integer('mortgaged_plots');
            $table->integer('developer_plots');
            $table->integer('land_owner_plots');
            $table->integer('registered_plots');
            $table->integer('booked_plots');
            $table->integer('available_plots');
            $table->timestamps();

            // Define the foreign key relationship
            $table->foreign('project_id')
                ->references('id')
                ->on('project_information')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plot_level_i');
    }
};
