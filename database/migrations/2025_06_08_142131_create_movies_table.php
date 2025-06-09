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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('director');
            $table->year('release_year');
            $table->float('rating')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('genre_id')->nullable()->constrained('genres');
            $table->string('poster_url')->default('https://placehold.co/270x400/0B4753/e09f3e?text=POSTER\nNON+DISPONIBILE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
