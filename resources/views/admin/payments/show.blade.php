@extends('layouts/contentNavbarLayout')

@section('title', 'Payment Details')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Payment Details</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td class="text-muted">Payment ID</td>
                            <td><strong>#{{ $payment->id }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Booking ID</td>
                            <td><strong>#{{ $payment->booking_id }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Amount</td>
                            <td><strong>₱{{ number_format($payment->amount, 2) }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Payment Method</td>
                            <td><strong>{{ ucwords(str_replace('_', ' ', $payment->payment_method ?? 'N/A')) }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Transaction ID</td>
                            <td><strong>{{ $payment->transaction_id ?? 'N/A' }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Status</td>
                            <td>
                                <span class="badge bg-{{ $payment->payment_status === 'completed' ? 'success' : ($payment->payment_status === 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($payment->payment_status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">Payment Date</td>
                            <td><strong>{{ $payment->payment_date ? $payment->payment_date->format('M d, Y H:i A') : 'Pending' }}</strong></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
