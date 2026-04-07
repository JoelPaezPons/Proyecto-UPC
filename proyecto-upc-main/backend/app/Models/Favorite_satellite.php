<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite_satellite extends Model
{
    protected $table = "favorite_satellite";
    // protected $table = "favorite_satelite";
    public $timestamps = false;
    public $fillable = ["id_user", "id_satellite"];
    // public $fillable = ["id_user", "id_satellite"];
}
