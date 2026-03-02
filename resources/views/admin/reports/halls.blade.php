@extends('layouts/contentNavbarLayout')

@section('title', 'Halls Report')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Halls Report</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Hall Name</th>
                                <th>Location</th>
                                <th>Capacity</th>
                                <th>Price/Day</th>
                                <th>Total Bookings</th>
                                <th>Revenue</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hallStats as $hall)
                                <tr>
                                    <td>{{ $hall->name }}</td>
                                    <td>{{ $hall->location }}</td>
                                    <td>{{ $hall->capacity }}</td>
                                    <td>₱{{ number_format($hall->price_per_day, 2) }}</td>
                                    <td>{{ $hall->bookings_count }}</td>
                                    <td>₱{{ number_format($hall->bookings->sum('total_amount'), 2) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $hall->status === 'available' ? 'success' : 'warning' }}">
                                            {{ ucfirst($hall->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $hallStats->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
