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
        Schema::create('guides', function (Blueprint $table) {
            $table->id('guide_id');
            $table->string('guide_name');
            $table->string('guide_fb');
            $table->string('guide_instagram');
            $table->string('guide_linkdln');
            $table->string('guide_twitter');
            $table->string('place');
            $table->string('guide_image');
            $table->string('user')->nullable();
            $table->integer('guide_status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
