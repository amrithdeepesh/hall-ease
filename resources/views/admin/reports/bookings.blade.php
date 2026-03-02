@extends('layouts/contentNavbarLayout')

@section('title', 'Bookings Report')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Bookings Report</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hall</th>
                                <th>Customer</th>
                                <th>Event Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>#{{ $booking->id }}</td>
                                    <td>{{ $booking->hall->name }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->event_date->format('M d, Y') }}</td>
                                    <td>₱{{ number_format($booking->total_amount, 2) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $booking->booking_status === 'confirmed' ? 'success' : 'warning' }}">
                                            {{ ucfirst($booking->booking_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $booking->payment_status === 'paid' ? 'success' : 'warning' }}">
                                            {{ ucfirst($booking->payment_status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
