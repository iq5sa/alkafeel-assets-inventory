<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AssetType extends Model
{
      protected $table = 'asset_types';
      protected $fillable = ['name', 'created_at', 'updated_at'];
      public $timestamps = false;




}
