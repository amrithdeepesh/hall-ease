<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Hall;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display all bookings
     */
    public function index()
    {
        $bookings = Booking::with(['hall', 'user'])
            ->latest()
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $halls = Hall::where('status', 'available')->get();
        $customers = User::where('role', 'user')->get();

        return view('admin.bookings.create', compact('halls', 'customers'));
    }

    /**
     * Store booking
     */
    public function store(Request $request)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'user_id' => 'required|exists:users,id',
            'event_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'total_amount' => 'required|numeric',
        ]);

        // 🔥 Check availability
        $exists = Booking::where('hall_id', $request->hall_id)
            ->where('event_date', $request->event_date)
            ->where('booking_status', '!=', 'cancelled')
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })
            ->exists();

        if ($exists) {
            return back()->with('error', 'Hall already booked for selected time.');
        }

        Booking::create([
            'hall_id' => $request->hall_id,
            'user_id' => $request->user_id,
            'event_date' => $request->event_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_amount' => $request->total_amount,
            'booking_status' => $request->booking_status ?? 'pending',
            'payment_status' => $request->payment_status ?? 'unpaid',
        ]);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking created successfully.');
    }

    /**
     * Show single booking
     */
    public function show(Booking $booking)
    {
        $booking->load(['hall', 'customer', 'payments']);
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Edit booking
     */
    public function edit(Booking $booking)
    {
        $halls = Hall::all();
        $customers = User::where('role', 'customer')->get();

        return view('admin.bookings.edit', compact('booking', 'halls', 'customers'));
    }

    /**
     * Update booking
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'customer_id' => 'required|exists:users,id',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'total_amount' => 'required|numeric',
            'advance_amount' => 'nullable|numeric',
            'booking_status' => 'required',
            'payment_status' => 'required',
        ]);

        $booking->update($request->all());

        return redirect()
            ->route('admin.bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    /**
     * Delete booking
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return back()->with('success', 'Booking deleted successfully.');
    }

    /**
     * Update booking status (Confirm / Cancel)
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'booking_status' => 'required'
        ]);

        $booking->update([
            'booking_status' => $request->booking_status,
            'cancellation_reason' => $request->cancellation_reason ?? null
        ]);

        return back()->with('success', 'Booking status updated.');
    }
}
