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
        Schema::create('movie_streaming_platform', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movies');
            $table->foreignId('streaming_platform_id')->constrained('streaming_platforms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_streaming_platform');
    }
};
