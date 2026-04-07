<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Model
{
    use HasFactory, Notifiable, HasApiTokens; 

    //table name
    protected $table = "users";
    public $timestamps = false;
    // Columns | Columnas
    public $fillable = ["id", "username", "name", "email", "password"];

    public function favoriteSatellites() {
    return $this->belongsToMany(Satellite::class, 'favorite_satellite', "id_user", "id_satellite");
}
}
