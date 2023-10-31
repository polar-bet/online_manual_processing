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
        Schema::create('documentation_articles', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('documentation_type_id');
                $table->string('name');
                $table->string('short_description');
                $table->text('description');
                $table->string('return')->nullable();
                $table->timestamps();
                $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentation_articles');
    }
};
