@extends('layouts/contentNavbarLayout')

@section('title', 'Events')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">All Events</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Event Date</th>
                                <th>Hall</th>
                                <th>Customer</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->event_date->format('M d, Y') }}</td>
                                    <td>{{ $event->hall->name }}</td>
                                    <td>{{ $event->user->name }}</td>
                                    <td>{{ $event->start_time }} - {{ $event->end_time }}</td>
                                    <td>
                                        <span class="badge bg-{{ $event->booking_status === 'confirmed' ? 'success' : ($event->booking_status === 'pending' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($event->booking_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $event->payment_status === 'paid' ? 'success' : 'warning' }}">
                                            {{ ucfirst($event->payment_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.events.show', $event) }}" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
