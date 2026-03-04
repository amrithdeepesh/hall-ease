@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Booking')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Booking</h4>
    </div>

    <div class="card-body">

        {{-- Success --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- Hall --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Select Hall</label>
                    <select name="hall_id" class="form-select" required>
                        @foreach($halls as $hall)
                            <option value="{{ $hall->id }}"
                                {{ $booking->hall_id == $hall->id ? 'selected' : '' }}>
                                {{ $hall->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Staff --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Select Staff</label>
                    <select name="customer_id" class="form-select" required>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ $booking->customer_id == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Event Date --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Event Date</label>
                    <input type="date"
                           name="event_date"
                           value="{{ $booking->event_date }}"
                           class="form-control"
                           required>
                </div>

                {{-- Start Time --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Start Time</label>
                    <input type="time"
                           name="start_time"
                           value="{{ $booking->start_time }}"
                           class="form-control"
                           required>
                </div>

                {{-- End Time --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">End Time</label>
                    <input type="time"
                           name="end_time"
                           value="{{ $booking->end_time }}"
                           class="form-control"
                           required>
                </div>

                {{-- Cancellation Reason --}}
                <div class="col-12 mb-3">
                    <label class="form-label">Cancellation Reason (If Cancelled)</label>
                    <textarea name="cancellation_reason"
                              class="form-control"
                              rows="3">{{ $booking->cancellation_reason }}</textarea>
                </div>

            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-save"></i> Update Booking
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
