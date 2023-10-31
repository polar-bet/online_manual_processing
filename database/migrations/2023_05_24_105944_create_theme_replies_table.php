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
        Schema::create('theme_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('user_id');
            $table->text('content');
            $table->boolean('is_solution')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_replies');
    }
};
