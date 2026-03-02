<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_id',
        'customer_id',
        'created_by',
        'event_date',
        'start_time',
        'end_time',
        'total_amount',
        'advance_amount',
        'booking_status',
        'payment_status',
        'cancellation_reason',
    ];

    protected $casts = [
        'event_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function images()
    {
        return $this->hasMany(HallImage::class);
    }
}
