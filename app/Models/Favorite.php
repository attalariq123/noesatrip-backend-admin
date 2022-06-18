<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = 'user_favorites';

    protected $fillable = [
        'user_id',
        'destination_id',
        'isFavorite',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function destination()
    {
        return $this->belongsTo('App\Models\Destination');
    }
}
