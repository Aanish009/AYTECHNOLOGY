<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->enum('provider', ['gemini', 'openai'])->default('gemini');
            $table->timestamps();

            $table->index('user_id');
        });

        Schema::create('ai_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained('ai_conversations')->cascadeOnDelete();
            $table->enum('role', ['user', 'assistant', 'system']);
            $table->longText('content');
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index('conversation_id');
        });

        Schema::create('knowledge_base', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->string('category')->nullable();
            $table->json('tags')->nullable();
            $table->string('source')->nullable();
            $table->longText('embedding')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('ai_prompt_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->longText('template');
            $table->json('variables')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_prompt_templates');
        Schema::dropIfExists('knowledge_base');
        Schema::dropIfExists('ai_messages');
        Schema::dropIfExists('ai_conversations');
    }
};
