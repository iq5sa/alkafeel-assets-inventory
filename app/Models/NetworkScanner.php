<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NetworkScanner extends Model
{
    //

    protected $fillable = ['ip_address', 'status', 'result'];
}
