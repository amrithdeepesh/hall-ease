@extends('layouts/contentNavbarLayout')

@section('title', 'Create Booking')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Create Booking</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.bookings.store') }}" method="POST">
            @csrf

            <div class="row">

                {{-- Hall --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Select Hall</label>
                    <select name="hall_id" class="form-select" required>
                        <option value="">Choose Hall</option>
                        @foreach($halls as $hall)
                            <option value="{{ $hall->id }}">
                                {{ $hall->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Customer --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Select Customer</label>
                    <select name="customer_id" class="form-select" required>
                        <option value="">Choose Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">
                                {{ $customer->name }} ({{ $customer->phone }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Event Date --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Event Date</label>
                    <input type="date" name="event_date" class="form-control" required>
                </div>

                {{-- Start Time --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Start Time</label>
                    <input type="time" name="start_time" class="form-control" required>
                </div>

                {{-- End Time --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">End Time</label>
                    <input type="time" name="end_time" class="form-control" required>
                </div>

            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-save"></i> Save Booking
                </button>

                <a href="{{ route('admin.bookings.index') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>

@endsection