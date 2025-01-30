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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('device_type_id')->constrained('device_types');
            $table->string(column: 'mac_address');
            $table->ipAddress('ip_address');
            $table->string('subnet_mask')->nullable();
            $table->text('network_info')->nullable();
            $table->string('default_gateway')->nullable();
            $table->string('dns_servers')->nullable();
            $table->enum('connection_type', ['Ethernet', 'Wi-Fi', 'Other'])->nullable();
            $table->string('vlan_info')->nullable();
            $table->string('port_details')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('location')->nullable();
            $table->string('firmware_version')->nullable();
            $table->string('software_version')->nullable();
            $table->string('hardware_version')->nullable();
            $table->foreignId('department_id')->constrained('departments');
            $table->date('purchase_date')->nullable();
            $table->int('maintenance_history_id')->nullable();
            $table->enum('operational_status', ['active', 'inactive', 'decommissioned'])->default('active');
            $table->text('health_metrics')->nullable();
            $table->enum('antivirus_status',['enabled_up_to_date','enabled_outdated','disabled','not_installed','error'])->default(false);
            $table->text('firewall_settings')->nullable();
            $table->text('network_traffic_stats')->nullable();
            $table->boolean('is_enabled')->default(true);
            $table->boolean('is_online')->default(false);
            $table->timestamp('last_seen_at')->nullable();
            $table->timestamp('last_boot_at')->nullable();
            $table->timestamp('last_reboot_at')->nullable();
            $table->timestamp('last_sync_at')->nullable();
            $table->timestamp('last_synced_at')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->softDeletes();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
