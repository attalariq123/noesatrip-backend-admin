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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode',
        'name',
        'description',
        'price',
        'overall_rating',
        'total_review',
    ];
}
