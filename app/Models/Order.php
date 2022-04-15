<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'destination_id',
        'start_date',
        'end_date',
        'ticket_quantity',
        'total_amount',
        'payment_status',
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
