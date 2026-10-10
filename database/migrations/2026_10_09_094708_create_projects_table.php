<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('subtitle');
            $table->string('thumbnail')->nullable();
            $table->string('year')->nullable();
            $table->string('role')->nullable();
            $table->string('status')->default('Selesai');
            $table->text('description');
            $table->text('features')->nullable();       // JSON array
            $table->text('tech_stack')->nullable();     // JSON array
            $table->text('documentation')->nullable();
            $table->text('article')->nullable();
            $table->text('screenshots')->nullable();    // JSON array
            $table->string('github_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};