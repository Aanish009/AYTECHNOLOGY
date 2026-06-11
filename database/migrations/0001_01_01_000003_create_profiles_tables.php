<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('alt_phone', 20)->nullable();
            $table->text('address_line1')->nullable();
            $table->text('address_line2')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->string('country', 100)->default('India');
            $table->string('education_level')->nullable();
            $table->boolean('is_10th_pass')->default(false);
            $table->string('t10_school_name')->nullable();
            $table->string('t10_board')->nullable();
            $table->year('t10_year')->nullable();
            $table->string('t10_percentage', 10)->nullable();
            $table->string('t10_marksheet')->nullable();
            $table->boolean('is_12th_pass')->default(false);
            $table->string('t12_stream')->nullable();
            $table->string('t12_board')->nullable();
            $table->string('t12_school_name')->nullable();
            $table->year('t12_year')->nullable();
            $table->string('t12_percentage', 10)->nullable();
            $table->string('t12_marksheet')->nullable();
            $table->boolean('is_undergraduate')->default(false);
            $table->string('ug_course_name')->nullable();
            $table->string('profile_photo')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });

        Schema::create('instructor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->text('bio')->nullable();
            $table->string('qualification')->nullable();
            $table->integer('experience_years')->default(0);
            $table->string('specialization')->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->default('India');
            $table->string('profile_photo')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('total_students')->default(0);
            $table->integer('total_courses')->default(0);
            $table->timestamps();

            $table->index('user_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instructor_profiles');
        Schema::dropIfExists('student_profiles');
    }
};
