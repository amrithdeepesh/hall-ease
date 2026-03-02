<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of payments
     */
    public function index()
    {
        $payments = Payment::with('booking')->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Display the specified payment
     */
    public function show(Payment $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Update payment status
     */
    public function updateStatus(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'payment_status' => 'in:pending,completed,failed',
        ]);

        $payment->update($validated);

        return redirect()
            ->back()
            ->with('success', 'Payment status updated successfully!');
    }
}
