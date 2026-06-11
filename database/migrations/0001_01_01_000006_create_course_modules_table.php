<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('position')->default(0);
            $table->integer('duration_minutes')->default(0);
            $table->boolean('is_free_preview')->default(false);
            $table->timestamps();

            $table->index(['course_id', 'position']);
        });

        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained('course_modules')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['video', 'pdf', 'text', 'quiz', 'assignment'])->default('video');
            $table->string('video_url')->nullable();
            $table->string('video_duration')->nullable();
            $table->string('pdf_file')->nullable();
            $table->longText('content')->nullable();
            $table->integer('position')->default(0);
            $table->integer('duration_minutes')->default(0);
            $table->boolean('is_free_preview')->default(false);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();

            $table->index(['module_id', 'position']);
            $table->index(['course_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('course_modules');
    }
};
