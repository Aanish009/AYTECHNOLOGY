<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificate_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('template_image');
            $table->json('fields_config')->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });

        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->foreignId('template_id')->nullable()->constrained('certificate_templates')->nullOnDelete();
            $table->string('certificate_number')->unique();
            $table->string('qr_code')->nullable();
            $table->string('pdf_path')->nullable();
            $table->timestamp('issued_at');
            $table->timestamp('expires_at')->nullable();
            $table->boolean('is_valid')->default(true);
            $table->timestamps();

            $table->index(['user_id', 'course_id']);
            $table->index('certificate_number');
        });

        Schema::create('certificate_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_id')->constrained()->cascadeOnDelete();
            $table->string('verified_by_ip', 45)->nullable();
            $table->string('verified_by_agent')->nullable();
            $table->timestamp('verified_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificate_verifications');
        Schema::dropIfExists('certificates');
        Schema::dropIfExists('certificate_templates');
    }
};
