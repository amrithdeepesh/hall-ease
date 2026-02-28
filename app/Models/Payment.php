<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'amount',
        'payment_method',
        'transaction_id',
        'payment_date',
        'payment_status',
    ];

    protected $casts = [
        'payment_date' => 'datetime',
    ];

    // 🔗 Payment belongs to Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}