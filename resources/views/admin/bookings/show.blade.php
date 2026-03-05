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
                            <td class="text-muted">Staff</td>
                            <td><strong>{{ optional($booking->customer)->name ?? optional($booking->user)->name ?? 'N/A' }}</strong></td>
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
                            <td class="text-muted">Resources</td>
                            <td>
                                @php
                                    $resourceLabels = [
                                        'projectors' => 'Projectors',
                                        'sound_systems' => 'Sound Systems',
                                        'lighting' => 'Lighting',
                                        'seating' => 'Seating',
                                        'other' => 'Other',
                                    ];

                                    $resources = collect($booking->resources ?? [])
                                        ->map(fn ($value) => $resourceLabels[$value] ?? ucfirst(str_replace('_', ' ', $value)))
                                        ->values()
                                        ->all();
                                    if (!empty($booking->resources_other)) {
                                        $resources[] = 'Other: ' . $booking->resources_other;
                                    }
                                @endphp
                                <strong>{{ count($resources) ? implode(', ', $resources) : '-' }}</strong>
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
