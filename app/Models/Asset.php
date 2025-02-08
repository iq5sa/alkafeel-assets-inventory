<?php

namespace App\Models;

use Illuminate\Contracts\Foundation\MaintenanceMode;
use Illuminate\Database\Eloquent\Model;



class Asset extends Model
{
    
   protected $fillable = [
        'name',
        'username',
        'domain',
        'device_type_id',
        'department_id',
        'connection_type',
        'ip_address',
        'mac_address',
        'serial_number',
        'assigned_to',
        'model',
        'location',
        'notes',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    


    public function assetType()
    {
        return $this->belongsTo(DeviceTypes::class, 'device_type_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
