<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class transactions extends Model
{
    protected $fillable = [
        'id_lokasi',
        'no_tiket',
        'no_polisi',
        'id_jenis',
        'masuk',
        'keluar',
        'perjam_pertama',
        'perjam_berikutnya',
        'max_perhari',
        'total_jam',
        'total_bayar',
    ];

    public function location(): BelongsTo
    {
        return $this->belongsTo(location::class, 'id_lokasi');
    }

    public function vehicleType(): BelongsTo
    {
        return $this->belongsTo(vehicle_types::class, 'id_jenis');
    }
}
