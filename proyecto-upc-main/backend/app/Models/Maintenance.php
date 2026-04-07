<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Maintenance extends Model
{
    protected $fillable = [
        'satellite_id',
        'reason',
        'status',
        'scheduled_at',
        'completed_at',
        'notes',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function satellite(): BelongsTo
    {
        return $this->belongsTo(Satellites::class, 'satellite_id');
    }
}