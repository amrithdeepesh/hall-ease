<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Hall;
use App\Models\Booking;
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
            'total_events' => Booking::count(),
        ];

        return view('admin.dashboard', $data);
    }
}
