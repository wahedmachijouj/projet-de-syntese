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
            $table->integer('startHour')->default(8)->after('dates_indis');
            $table->integer('endHour')->default(17)->after('startHour');
            $table->integer('interval')->default(30)->after('endHour');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calendriers', function (Blueprint $table) {
            $table->dropColumn('startHour');
            $table->dropColumn('endHour');
            $table->dropColumn('interval');
        });
    }
};
