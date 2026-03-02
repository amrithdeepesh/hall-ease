@extends('layouts/contentNavbarLayout')

@section('title', 'Event Details')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Event Details</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td class="text-muted">Booking ID</td>
                            <td><strong>#{{ $event->id }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Hall</td>
                            <td><strong>{{ $event->hall->name }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Customer</td>
                            <td><strong>{{ $event->user->name }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Event Date</td>
                            <td><strong>{{ $event->event_date->format('M d, Y') }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Time</td>
                            <td><strong>{{ $event->start_time }} - {{ $event->end_time }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Total Amount</td>
                            <td><strong>₱{{ number_format($event->total_amount, 2) }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Booking Status</td>
                            <td>
                                <span class="badge bg-{{ $event->booking_status === 'confirmed' ? 'success' : ($event->booking_status === 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($event->booking_status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">Payment Status</td>
                            <td>
                                <span class="badge bg-{{ $event->payment_status === 'paid' ? 'success' : 'warning' }}">
                                    {{ ucfirst($event->payment_status) }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
