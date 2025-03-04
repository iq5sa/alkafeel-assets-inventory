<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Asset extends Model
{

    protected $table = 'assets';
    protected $fillable = [
        'name',
        'asset_type_id',
        'mac_address',
        'ip_address',
        'subnet_mask',
        'network_info',
        'default_gateway',
        'dns_servers',
        'connection_type',
        'vlan_info',
        'port_details',
        'assigned_to',
        'model',
        'serial_number',
        'location',
        'firmware_version',
        'software_version',
        'hardware_version',
        'department_id',
        'purchase_date',
        'maintenance_history_id',
        'operational_status',
        'antivirus_status',
        'firewall_settings',
        'network_traffic_stats',
        'is_enabled',
        'is_online',
        'last_seen_at',
        'last_boot_at',
        'last_reboot_at',
        'last_sync_at',
        'last_synced_at',
        'created_by',
        'updated_by',
        'deleted_by',
        'username',
        'domain',

        // Additional Fields from the Second Table
        'connectedUser',
        'oSName',
        'oSVersion',
        'architecture',
        'windowsLicense',
        'windowsKey',
        'networkData',
        'swap',
        'memory',
        'uuid',
        'userAgent',
        'lastInventory',
        'cPUData',
        'diskData',
        'bIOSVersion',
        'bIOSManufacturer',
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
