<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // thumbnail udah ada (string)
            // screenshots udah ada (text, JSON array)
            // Kita cuma perlu ubah cara isinya, gak perlu ubah schema
        });
    }

    public function down(): void
    {
        //
    }
};