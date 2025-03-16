<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetsController extends Controller
{






    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mac_address' => 'required|array',
            'network_info' => 'nullable|array',
            'ip_address' => 'nullable|string|max:255',
            'dns_servers' => 'nullable|array',
            'connection_type' => 'nullable|string|max:50',
            'model' => 'nullable|string|max:255',
            'serial_number' => 'nullable|string|max:255',
            'firmware_version' => 'nullable|string|max:255',
            'software_version' => 'nullable|string|max:255',
            'hardware_version' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255',
            'domain' => 'nullable|string|max:255',
            'os_name' => 'nullable|string|max:255',
            'os_version' => 'nullable|string|max:255',
            'architecture' => 'nullable|string|max:50',
            'windows_license' => 'nullable|string|max:255',
            'cpu_data' => 'nullable|string|max:255',
            'memory' => 'nullable|string|max:50',
            'swap' => 'nullable|string|max:50',
            'user_agent' => 'nullable|string|max:255',
            'bios_version' => 'nullable|string|max:255',
            'bios_manufacturer' => 'nullable|string|max:255',
            'gpu_details' => 'nullable|array',
            'battery_health' => 'nullable|integer',
            'cpu_load' => 'nullable|numeric',
            'ram_usage' => 'nullable|string|max:50',
            'disk_read_speed' => 'nullable|numeric',
            'public_ip' => 'nullable|string|max:255',
            'uptime' => 'nullable|numeric',
            'last_boot_at' => 'nullable|string|max:255',
            'logged_in_users' => 'nullable|array',
            'bios_boot_mode' => 'nullable|string|max:50',
            'windows_activation_status' => 'nullable|string',
            'installed_apps' => 'nullable|array',
        ]);

        $device = Asset::updateOrCreate(
            ['mac_address' => $validated['mac_address']], // Use MAC as unique identifier
            $validated
        );

        return response()->json([
            'message' => 'Device data stored successfully!',
            'device' => $device
        ], 201);
    }
}
