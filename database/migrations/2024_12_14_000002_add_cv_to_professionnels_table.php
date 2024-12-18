<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCvToProfessionnelsTable extends Migration
{
    public function up(): void
    {
        Schema::table('professionnels', function (Blueprint $table) {
            $table->string('cv')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('professionnels', function (Blueprint $table) {
            $table->dropColumn('cv');
        });
    }
} 