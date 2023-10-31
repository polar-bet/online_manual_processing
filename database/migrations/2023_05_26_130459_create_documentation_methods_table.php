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
        Schema::create('documentation_methods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documentation_article_id');
            $table->string('name');
            $table->text('short_description');
            $table->text('description');
            $table->text('example');
            $table->string('syntax');
            $table->string('return');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentation_methods');
    }
};
