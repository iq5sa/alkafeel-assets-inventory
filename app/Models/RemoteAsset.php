<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 */
class RemoteAsset extends Model
{
    //

    protected $table = 'remote_assets';

    protected  $fillable = [
        "connectedUser",
        "oSName",
        "oSVersion",
        "architecture" ,
        "windowsLicense" ,
        "windowsKey" ,
        "domain" ,
        "networkData",
        "swap" ,
        "memory",
        "uuid" ,
        "userAgent",
        "lastInventory",
        "cPUData",
        "diskData",
        "bIOSVersion",
        "bIOSManufacturer"
    ];
}
