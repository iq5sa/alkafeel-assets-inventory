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

        Schema::create('asset_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });


        //assets table
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('asset_type_id');
            $table->string('mac_address');
            $table->string('ip_address', 45);
            $table->string('subnet_mask')->nullable();
            $table->text('network_info')->nullable();
            $table->string('default_gateway')->nullable();
            $table->string('dns_servers')->nullable();
            $table->enum('connection_type', ['ethernet', 'wi-fi', 'other'])->nullable();
            $table->string('vlan_info')->nullable();
            $table->string('port_details')->nullable();
            $table->string('assigned_to')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('location')->nullable();
            $table->string('firmware_version')->nullable();
            $table->string('software_version')->nullable();
            $table->string('hardware_version')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->date('purchase_date')->nullable();
            $table->string('maintenance_history_id')->nullable();
            $table->enum('operational_status', ['active', 'inactive', 'decommissioned'])->default('active');
            $table->enum('antivirus_status', ['enabled_up_to_date', 'enabled_outdated', 'disabled', 'not_installed', 'error'])->nullable();
            $table->text('firewall_settings')->nullable();
            $table->text('network_traffic_stats')->nullable();
            $table->boolean('is_enabled')->default(1);
            $table->boolean('is_online')->default(0);
            $table->timestamp('last_seen_at')->nullable();
            $table->timestamp('last_boot_at')->nullable();
            $table->timestamp('last_reboot_at')->nullable();
            $table->timestamp('last_sync_at')->nullable();
            $table->timestamp('last_synced_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('username')->nullable();
            $table->string('domain');

            // Additional Fields from the Second Table
            $table->string('connectedUser');
            $table->string('oSName');
            $table->string('oSVersion');
            $table->string('architecture');
            $table->string('windowsLicense');
            $table->string('windowsKey');
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

            // Indexes & Foreign Keys
            $table->foreign('asset_type_id')->references('id')->on('asset_types')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_types');
        Schema::dropIfExists('assets');

    }
};
