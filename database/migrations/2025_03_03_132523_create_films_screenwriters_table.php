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
        Schema::create('films_screenwriters', function (Blueprint $table) {
            $table->unsignedBigInteger("film_id");
            $table->unsignedBigInteger("screenwriter_id");
            $table->timestamps();
            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
            $table->foreign('screenwriter_id')->references('id')->on('screenwriters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films_screenwriters');
    }
};
