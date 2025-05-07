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
        Schema::create('threads', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');
            $table->text('body');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Corrección
            $table->foreignId('forum_id')->constrained('forums')->onDelete('cascade'); // Corrección
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Corrección

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('threads');
    }
};
