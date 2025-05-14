<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('rating')->unsigned()->default(1);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('rateable_type');
            $table->unsignedBigInteger('rateable_id');
            $table->timestamps();

            // Índice para mejorar rendimiento en consultas polimórficas
            $table->index(['rateable_type', 'rateable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
