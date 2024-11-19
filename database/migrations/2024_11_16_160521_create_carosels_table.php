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
        Schema::create('carosels', function (Blueprint $table) {
            $table->id('carosel_id');
            $table->string('header1');
            $table->string('header2');
            $table->string('header3');
            $table->string('link');
            $table->string('images');
            $table->string('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carosels');
    }
};
