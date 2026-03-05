@extends('layouts/contentNavbarLayout')

@section('title', 'Bookings')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Bookings</h4>
        <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Add Booking
        </a>
    </div>

    @php
        $renderRows = function ($bookings, $isCancelled = false) {
            $resourceLabels = [
                'projectors' => 'Projectors',
                'sound_systems' => 'Sound Systems',
                'lighting' => 'Lighting',
                'seating' => 'Seating',
                'other' => 'Other',
            ];

            foreach ($bookings as $booking) {
                $resources = collect($booking->resources ?? [])
                    ->map(fn ($value) => $resourceLabels[$value] ?? ucfirst(str_replace('_', ' ', $value)))
                    ->values()
                    ->all();
                if (!empty($booking->resources_other)) {
                    $resources[] = 'Other: ' . $booking->resources_other;
                }
                $resourcesText = count($resources) ? implode(', ', $resources) : '-';

                echo '<tr>';
                echo '<td>' . e($booking->id) . '</td>';
                echo '<td>' . e(optional($booking->hall)->name ?? 'N/A') . '</td>';
                echo '<td>' . e(optional($booking->customer)->name ?? optional($booking->user)->name ?? 'N/A') . '</td>';
                echo '<td>' . e(optional($booking->event_date)->format('M d, Y')) . '</td>';
                echo '<td>' . e(\Carbon\Carbon::parse($booking->start_time)->format('H:i')) . ' - ' . e(\Carbon\Carbon::parse($booking->end_time)->format('H:i')) . '</td>';
                echo '<td>' . e($resourcesText) . '</td>';
                if ($isCancelled) {
                    echo '<td>' . e($booking->cancellation_reason ?? '-') . '</td>';
                }
                echo '<td>';
                echo '<a href="' . e(route('admin.bookings.show', $booking->id)) . '" class="btn btn-sm btn-info me-1"><i class="bx bx-show"></i></a>';
                echo '<a href="' . e(route('admin.bookings.edit', $booking->id)) . '" class="btn btn-sm btn-warning me-1"><i class="bx bx-edit"></i></a>';
                echo '<form action="' . e(route('admin.bookings.destroy', $booking->id)) . '" method="POST" class="d-inline">';
                echo csrf_field();
                echo method_field('DELETE');
                echo '<button class="btn btn-sm btn-danger" onclick="return confirm(\'Delete this booking?\')"><i class="bx bx-trash"></i></button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
        };
    @endphp

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Upcoming Bookings</h6>
            <span class="badge bg-success">{{ $upcomingBookings->count() }}</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hall</th>
                            <th>Staff</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Resources</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($upcomingBookings->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center text-muted">No upcoming bookings.</td>
                            </tr>
                        @else
                            {!! $renderRows($upcomingBookings) !!}
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Completed (Done) Bookings</h6>
            <span class="badge bg-secondary">{{ $completedBookings->count() }}</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hall</th>
                            <th>Staff</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Resources</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($completedBookings->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center text-muted">No completed bookings.</td>
                            </tr>
                        @else
                            {!! $renderRows($completedBookings) !!}
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Cancelled Bookings</h6>
            <span class="badge bg-danger">{{ $cancelledBookings->count() }}</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hall</th>
                            <th>Staff</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Resources</th>
                            <th>Cancellation Reason</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($cancelledBookings->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center text-muted">No cancelled bookings.</td>
                            </tr>
                        @else
                            {!! $renderRows($cancelledBookings, true) !!}
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
