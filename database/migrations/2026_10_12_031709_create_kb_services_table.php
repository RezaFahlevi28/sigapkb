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
        Schema::create('kb_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category')->default('Umum');
            $table->text('short_description');
            $table->text('full_description')->nullable();
            $table->string('effectiveness')->nullable();
            $table->string('duration')->nullable();
            $table->text('procedure_instructions')->nullable();
            $table->text('advantages')->nullable();
            $table->text('side_effects')->nullable();
            $table->string('icon')->default('shield-check');
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kb_services');
    }
};
