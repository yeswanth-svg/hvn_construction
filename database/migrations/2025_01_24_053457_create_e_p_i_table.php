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
        Schema::create('e_p_i', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->integer('plot_no');
            $table->string('ownership');
            $table->string('name');
            $table->string('geo_coordinates_n');
            $table->string('geo_coordinates_e');
            $table->integer('plot_area_sq_yds');
            $table->decimal('plot_area_cents');
            $table->string('facing');
            $table->integer('size_east');
            $table->integer('size_west');
            $table->integer('size_north');
            $table->integer('size_south');
            $table->enum('plot_availability_for_sale', ['yes', 'no', 'mortgaged']);
            $table->timestamps();

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
        Schema::dropIfExists('e_p_i');
    }
};
