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
        Schema::create('project_information', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('lp_no');
            $table->string('rera_no');
            $table->string('location');
            $table->integer('survey_no');
            $table->decimal('extent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_information');
    }
};
