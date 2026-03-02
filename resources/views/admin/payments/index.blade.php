@extends('layouts/contentNavbarLayout')

@section('title', 'Payments')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">All Payments</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Payment Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>#{{ $payment->booking_id }}</td>
                                    <td>₱{{ number_format($payment->amount, 2) }}</td>
                                    <td>{{ ucwords(str_replace('_', ' ', $payment->payment_method ?? 'N/A')) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $payment->payment_status === 'completed' ? 'success' : ($payment->payment_status === 'pending' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($payment->payment_status) }}
                                        </span>
                                    </td>
                                    <td>{{ $payment->payment_date ? $payment->payment_date->format('M d, Y') : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('admin.payments.show', $payment) }}" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $payments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
