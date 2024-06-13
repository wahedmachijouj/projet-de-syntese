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
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->integer('tele');
            $table->string('email');
            $table->datetime('date');
            $table->string('info',500);
            $table->unsignedBigInteger('user_p');
            $table->unsignedBigInteger('user_n');
            $table->foreign('user_p')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('user_n')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rdvs');
    }
};
