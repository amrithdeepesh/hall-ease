<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Hall;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        $data = [
            'total_users' => User::count(),
            'total_halls' => Hall::count(),
            'total_bookings' => Booking::count(),
            'total_revenue' => Payment::where('payment_status', 'completed')->sum('amount'),
            'pending_bookings' => Booking::where('booking_status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('booking_status', 'confirmed')->count(),
        ];

        return view('admin.dashboard', $data);
    }
}
