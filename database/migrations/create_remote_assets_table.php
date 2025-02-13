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
        Schema::create('remote_assets', function (Blueprint $table) {
            $table->id();
            $table->string('connectedUser');
            $table->string('oSName');
            $table->string('oSVersion');
            $table->string('architecture');
            $table->string('windowsLicense');
            $table->string('windowsKey');
            $table->string('domain');
            $table->text('networkData');
            $table->string('swap');
            $table->string('memory');
            $table->uuid('uuid');
            $table->string('userAgent');
            $table->timestamp('lastInventory');
            $table->text('cPUData');
            $table->text('diskData');
            $table->string('bIOSVersion');
            $table->string('bIOSManufacturer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remote_assets');

    }
};
