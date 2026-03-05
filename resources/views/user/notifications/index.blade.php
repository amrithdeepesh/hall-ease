@extends('layouts/contentNavbarLayout')

@section('title', 'Notifications')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Latest Updates</h5>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Recent Booking Notifications</h6>
            <span class="badge bg-primary">{{ $latestUpdates->count() }}</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Hall</th>
                            <th>Event</th>
                            <th>Details</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestUpdates as $update)
                            <tr>
                                <td>
                                    <span class="badge bg-label-{{ $update['type_class'] }}">{{ $update['type'] }}</span>
                                </td>
                                <td>{{ $update['hall_name'] }}</td>
                                <td>{{ $update['event_name'] }}</td>
                                <td>{{ $update['details'] }}</td>
                                <td>{{ optional($update['time'])->format('M d, Y h:i A') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No recent updates found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
