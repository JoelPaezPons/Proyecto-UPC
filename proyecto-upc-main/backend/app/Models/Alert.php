<?php

// app/Models/Alert.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alert extends Model
{
    protected $fillable = [
        'satellite_id',
        'message',
        'severity',     // RED | YELLOW
        'detected_at',
    ];

    protected $casts = [
        'detected_at' => 'datetime',
    ];

    public function satellite(): BelongsTo
    {
        return $this->belongsTo(Satellite::class);
    }
}