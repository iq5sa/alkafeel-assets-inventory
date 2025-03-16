<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Asset extends Model
{

    protected $table = 'assets';
    protected $fillable = [
        'name',
        'mac_address',
        'network_info',
        'ip_address',
        'dns_servers',
        'connection_type',
        'model',
        'serial_number',
        'firmware_version',
        'software_version',
        'hardware_version',
        'username',
        'domain',
        'os_name',
        'os_version',
        'architecture',
        'windows_license',
        'cpu_data',
        'memory',
        'swap',
        'user_agent',
        'bios_version',
        'bios_manufacturer',
        'gpu_details',
        'battery_health',
        'cpu_load',
        'ram_usage',
        'disk_read_speed',
        'public_ip',
        'uptime',
        'last_boot_at',
        'logged_in_users',
        'bios_boot_mode',
        'windows_activation_status',
        'installed_apps'
    ];

    protected $casts = [
        'network_info' => 'array',
        'dns_servers' => 'array',
        'gpu_details' => 'array',
        'logged_in_users' => 'array',
        'installed_apps' => 'array',
    ];



    public function type()
    {
        return $this->belongsTo(AssetType::class, 'asset_type_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }


    public function softwares(): BelongsToMany
    {
        return $this->belongsToMany(Software::class)
            ->withPivot('status')
            ->withTimestamps();
    }
}
