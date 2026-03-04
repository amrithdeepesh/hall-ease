@extends('layouts/contentNavbarLayout')

@section('title', 'Bookings')

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Bookings</h4>
            <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Add Booking
            </a>
        </div>

        <div class="card-body">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Error Message --}}
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hall</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->hall->name }}</td>
                                <td>{{ $booking->customer->name }}</td>
                                <td>{{ $booking->event_date }}</td>
                                <td>
                                    {{ $booking->start_time }} - {{ $booking->end_time }}
                                </td>

                                <td>
                                    <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">
                                        <i class="bx bx-show"></i>
                                    </a>

                                    <a href="{{ route('admin.bookings.edit', $booking->id) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this booking?')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $bookings->links() }}
            </div>

        </div>
    </div>

@endsection
