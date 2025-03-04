<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Software extends Model
{
    //

    protected $table = "softwares";

    protected $fillable = [
        'name',
        'version',
        'publisher',
        'description',
    ];

    public function assets(): BelongsToMany
    {
        return $this->belongsToMany(Asset::class)
            ->withPivot('status')
            ->withTimestamps();
    }
}
