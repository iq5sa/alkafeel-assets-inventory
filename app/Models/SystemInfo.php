<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemInfo extends Model
{
    //

    protected $table = 'systemInfo';

    protected  $fillable = [
        "ConnectedUser",
        "OSName",
        "OSVersion",
        "Architecture" ,
        "WindowsLicense" ,
        "WindowsKey" ,
        "Domain" ,
        "NetworkData",
        "Swap" ,
        "Memory",
        "UUID" ,
        "UserAgent",
        "LastInventory",
        "data",
        "CPUData",
        "DiskData",
        "BIOSVersion",
        "BIOSManufacturer"
    ];
}
