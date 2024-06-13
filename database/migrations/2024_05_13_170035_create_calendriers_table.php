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
        Schema::create('calendriers', function (Blueprint $table) {
            $table->id();
            $table->json('dates_dis')->nullable();
            $table->json('dates_indis')->nullable();
            $table->unsignedBigInteger('user_p');
            $table->foreign('user_p')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendriers');
    }
};
