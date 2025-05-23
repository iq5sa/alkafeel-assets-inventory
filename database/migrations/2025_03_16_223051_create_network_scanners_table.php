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
        Schema::create('network_scanners', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->string('status')->default('pending'); // pending, scanning, completed, failed
            $table->text('result')->nullable();
            $table->enum("scan_type",["quick","full","os","ports"])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('network_scanners');
    }
};
