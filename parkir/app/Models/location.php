<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class location extends Model
{
    protected $fillable = [
        'location_name',
        'max_motorcycle',
        'max_car',
        'max_other',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(transactions::class, 'id_lokasi');
    }
}
