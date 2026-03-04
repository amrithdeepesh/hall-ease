<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'campus_name',
        'location',
        'capacity',
        'description',
        'image',
        'status',
    ];

    // 🔗 One Hall → Many Bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // 🔗 One Hall → Many Images
    public function images()
    {
        return $this->hasMany(HallImage::class);
    }
}
