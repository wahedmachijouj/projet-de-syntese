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
        Schema::table('calendriers', function (Blueprint $table) {
            $table->dropColumn('dates_dis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calendriers', function (Blueprint $table) {
            $table->json('dates_dis')->nullable()->after('dates_indis');
        });
    }
};
