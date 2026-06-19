<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class vehicle_types extends Model
{
    protected $fillable = [
        'jenis',
        'perjam_pertama',
        'perjam_berikutnya',
        'max_perhari',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(transactions::class, 'id_jenis');
    }
}
