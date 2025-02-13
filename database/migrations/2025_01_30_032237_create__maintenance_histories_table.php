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
        Schema::create('maintenance_histories', function (Blueprint $table) {

            $table->id(); // Auto-incrementing primary key
            $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade'); // Foreign key to devices table
            $table->date('maintenance_date'); // Date of maintenance
            $table->string('performed_by'); // Person or team who performed the maintenance
            $table->text('description'); // Detailed description of the maintenance performed
            $table->enum('maintenance_type', ['preventive', 'corrective', 'predictive']); // Type of maintenance
            $table->decimal('cost', 8, 2)->nullable(); // Cost of maintenance, if applicable
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_histories');
    }
};
