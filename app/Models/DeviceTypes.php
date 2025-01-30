<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class DeviceTypes extends Model
{
      protected $table = 'device_types';
      protected $fillable = ['type_name', 'created_at', 'updated_at'];
      public $timestamps = false;
      public function devices()
      {
            return $this->hasMany('App\Models\Devices');
      }
    
}
