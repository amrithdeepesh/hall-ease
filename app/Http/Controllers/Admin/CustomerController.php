<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of staff
     */
    public function index()
    {
        $customers = User::where('role', 'customer')
            ->withCount('bookings')
            ->latest()
            ->paginate(10);

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Display the specified staff
     */
    public function show(User $customer)
    {
        if ($customer->role !== 'customer') {
            abort(404);
        }

        $bookings = $customer->bookings()
            ->with('hall')
            ->latest()
            ->paginate(10);

        return view('admin.customers.show', compact('customer', 'bookings'));
    }

    /**
     * Remove the specified staff
     */
    public function destroy(User $customer)
    {
        if ($customer->role === 'customer') {

            // Optional: Prevent delete if active bookings exist
            if ($customer->bookings()->where('booking_status', 'confirmed')->exists()) {
                return back()->with('error', 'Cannot delete staff with active bookings!');
            }

            $customer->delete();

            return redirect()
                ->route('admin.customers.index')
                ->with('success', 'Staff deleted successfully!');
        }

        return back()->with('error', 'Only staff can be deleted!');
    }
}
