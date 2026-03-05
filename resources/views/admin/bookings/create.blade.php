@extends('layouts/contentNavbarLayout')

@section('title', 'Create Booking')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Create Booking</h4>
    </div>

    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.bookings.store') }}" method="POST">
            @csrf

            <div class="row">

                {{-- Hall --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Select Hall</label>
                    <select name="hall_id" class="form-select" required>
                        <option value="">Choose Hall</option>
                        @foreach($halls as $hall)
                            <option value="{{ $hall->id }}" {{ old('hall_id') == $hall->id ? 'selected' : '' }}>
                                {{ $hall->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Staff --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Select Staff</label>
                    <select name="customer_id" class="form-select" required>
                        <option value="">Choose Staff</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }} ({{ $customer->phone }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Event Date --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Event Date</label>
                    <input type="date" name="event_date" value="{{ old('event_date') }}" class="form-control" required>
                </div>

                {{-- Start Time --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Start Time</label>
                    <input type="time" name="start_time" value="{{ old('start_time') }}" class="form-control" required>
                </div>

                {{-- End Time --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">End Time</label>
                    <input type="time" name="end_time" value="{{ old('end_time') }}" class="form-control" required>
                </div>

            </div>

            <hr class="my-4">
            <h5 class="mb-3">Event Details</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Event Name</label>
                    <input type="text" name="event_name" value="{{ old('event_name') }}" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Department</label>
                    <input type="text" name="event_department" value="{{ old('event_department') }}" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Event Type</label>
                    <input type="text" name="event_type" value="{{ old('event_type') }}" class="form-control" required>
                </div>
            </div>

            <hr class="my-4">
            <h5 class="mb-3">Coordinator Details</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Coordinator Name</label>
                    <input type="text" name="coordinator_name" value="{{ old('coordinator_name') }}" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="coordinator_phone" value="{{ old('coordinator_phone') }}" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Department</label>
                    <input type="text" name="coordinator_department" value="{{ old('coordinator_department') }}" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email ID</label>
                    <input type="email" name="coordinator_email" value="{{ old('coordinator_email') }}" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Emergency Number</label>
                    <input type="text" name="coordinator_emergency_number" value="{{ old('coordinator_emergency_number') }}" class="form-control" required>
                </div>
            </div>

            <hr class="my-4">
            <h5 class="mb-3">Media Requirements</h5>
            <div class="row">
                @php
                    $selectedMedia = old('media_requirements', []);
                @endphp
                <div class="col-md-12 mb-3">
                    <div class="d-flex flex-wrap gap-3">
                        @foreach([
                            'photography' => 'Photography',
                            'videography' => 'Videography',
                            'livestreaming' => 'Livestreaming',
                            'reels' => 'Reels',
                            'photos' => 'Photos',
                            'others' => 'Others'
                        ] as $value => $label)
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="media_{{ $value }}"
                                       name="media_requirements[]"
                                       value="{{ $value }}"
                                       {{ in_array($value, $selectedMedia, true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="media_{{ $value }}">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Others (Please specify)</label>
                    <input type="text"
                           name="media_requirements_other"
                           value="{{ old('media_requirements_other') }}"
                           class="form-control"
                           placeholder="Enter other media requirement">
                </div>
            </div>

            <hr class="my-4">
            <h5 class="mb-3">Resources Required</h5>
            <div class="row">
                @php
                    $selectedResources = old('resources', []);
                @endphp
                <div class="col-md-12 mb-3">
                    <div class="d-flex flex-wrap gap-3">
                        @foreach([
                            'projectors' => 'Projectors',
                            'sound_systems' => 'Sound Systems',
                            'lighting' => 'Lighting',
                            'seating' => 'Seating',
                            'other' => 'Other'
                        ] as $value => $label)
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="resource_{{ $value }}"
                                       name="resources[]"
                                       value="{{ $value }}"
                                       {{ in_array($value, $selectedResources, true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="resource_{{ $value }}">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Other Resource (Please specify)</label>
                    <input type="text"
                           name="resources_other"
                           value="{{ old('resources_other') }}"
                           class="form-control"
                           placeholder="Enter other resource requirement">
                </div>
            </div>

            <div class="form-check mt-2">
                <input class="form-check-input"
                       type="checkbox"
                       value="1"
                       id="details_confirmation"
                       name="details_confirmation"
                       {{ old('details_confirmation') ? 'checked' : '' }}
                       required>
                <label class="form-check-label" for="details_confirmation">
                    I confirm that the above details are correct.
                </label>
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
