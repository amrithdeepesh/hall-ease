@extends('layouts/contentNavbarLayout')

@section('title', 'Booking Details')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Booking #{{ $booking->id }}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td class="text-muted">Hall</td>
                            <td><strong>{{ $booking->hall->name }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Customer</td>
                            <td><strong>{{ $booking->user->name }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Event Date</td>
                            <td><strong>{{ $booking->event_date->format('M d, Y') }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Time</td>
                            <td><strong>{{ $booking->start_time }} - {{ $booking->end_time }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Total Amount</td>
                            <td><strong>₱{{ number_format($booking->total_amount, 2) }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Booking Status</td>
                            <td>
                                <span class="badge bg-{{ $booking->booking_status === 'confirmed' ? 'success' : ($booking->booking_status === 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($booking->booking_status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">Payment Status</td>
                            <td>
                                <span class="badge bg-{{ $booking->payment_status === 'paid' ? 'success' : 'warning' }}">
                                    {{ ucfirst($booking->payment_status) }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
