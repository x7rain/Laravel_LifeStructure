<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('life_elements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('icon_image')->nullable();
            $table->unsignedBigInteger('sort_order')->nullable();
            $table->string('type');

            $table->unsignedBigInteger('life_id');
            $table->index('life_id');

            $table->unsignedBigInteger('element_folder_id')->nullable();
            $table->index('element_folder_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('life_elements');
    }
};
