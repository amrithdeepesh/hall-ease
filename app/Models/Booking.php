<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hall_id',
        'event_date',
        'start_time',
        'end_time',
        'total_amount',
        'booking_status',
        'payment_status',
    ];

    protected $casts = [
        'event_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    // 🔗 Booking belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Booking belongs to Hall
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    // 🔗 One Booking → One Payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}