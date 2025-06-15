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
            $table->string('title', 255);
            $table->string('director', 255);
            $table->smallInteger('release_year');
            $table->decimal('rating', 4, 2)->nullable();
            $table->text('description')->nullable();
            $table->foreignId('genre_id')->nullable()->constrained('genres');
            $table->string('poster_url')->default('https://placehold.co/270x400/0B4753/e09f3e?text=POSTER+NON+DISPONIBILE');
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
