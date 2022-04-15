<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Destination extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'destinations';

    protected $fillable = [
        'kode',
        'name',
        'description',
        'price',
        'city',
        'image_path',
        'overall_rating',
        'total_review',
    ];

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }
}
