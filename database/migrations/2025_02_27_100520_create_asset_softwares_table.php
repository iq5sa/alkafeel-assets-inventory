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
        Schema::create('asset_softwares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id');
            $table->foreignId('software_id');
            $table->enum('status', ['allowed', 'blocked'])->default('allowed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_software');
    }
};
