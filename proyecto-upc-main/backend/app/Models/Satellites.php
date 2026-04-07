<?php

namespace App\Models;

use Database\Factories\SatellitesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satellites extends Model
{
    use HasFactory;

    protected $table = 'satellites';

    protected static function newFactory()
    {
        return SatellitesFactory::new();
    }

    protected $fillable = [
        'name',
        'norad_id',
        'altitude',
        'velocity',
        'battery',
        'status',
        'mode',
        'anomalies_count',
    ];

      public function scopeSearch($query, string $term)
    {
        return $query
            ->where('name', 'like', "%{$term}%")
            ->orWhere('norad_id', 'like', "%{$term}%");
    }
}