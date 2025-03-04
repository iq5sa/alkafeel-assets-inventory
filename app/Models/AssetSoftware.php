<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetSoftware extends Model
{
    protected $table = 'asset_softwares';

    protected $fillable = ['asset_id','software_id',"status"];

    public function software(){
        return $this->belongsTo('App\Models\Software','software_id');
    }

    public function asset(){
        return $this->belongsTo('App\Models\Asset','asset_id');
    }
}
