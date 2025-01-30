<?php

namespace App\Models;

use Illuminate\Contracts\Foundation\MaintenanceMode;
use Illuminate\Database\Eloquent\Model;



class Device extends Model
{
    
      public function maintenanceHistories()
{
    return $this->hasMany(MaintenanceHistory::class);
}
    
}
