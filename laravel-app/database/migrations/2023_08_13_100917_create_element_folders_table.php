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
        Schema::create('element_folders', function (Blueprint $table) {
            $table->id();
            $table->string('background_image')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('life_element_id');
            $table->index('life_element_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('element_folders');
    }
};
