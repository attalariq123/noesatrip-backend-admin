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
        'overall_rating',
        'total_review',
    ];
}
