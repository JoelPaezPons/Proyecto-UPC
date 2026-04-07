<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satellite extends Model
{
    /** @use HasFactory<\Database\Factories\SatelliteFactory> */
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'photo'];
    protected $table = 'satellite';
}
