<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Tambah kolom project_date
            $table->date('project_date')->nullable()->after('subtitle');
        });

        // Hapus kolom yang gak dipakai
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['year', 'role', 'documentation']);
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('year')->nullable();
            $table->string('role')->nullable();
            $table->text('documentation')->nullable();
            $table->dropColumn('project_date');
        });
    }
};