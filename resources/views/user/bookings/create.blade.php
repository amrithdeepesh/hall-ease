@extends('layouts/contentNavbarLayout')

@section('title', 'New Booking')

@section('page-style')
<style>
    .selected-hall-hero {
        border: 1px solid #e8edf4;
        border-radius: 0.9rem;
    }

    .selected-hall-hero .hall-photo {
        width: 100%;
        height: 280px;
        object-fit: cover;
        border-radius: 0.75rem 0.75rem 0 0;
    }

    .selected-hall-hero .hall-photo-single {
        width: 100%;
        height: 280px;
        object-fit: cover;
        border-radius: 0.75rem 0.75rem 0 0;
    }

    .selected-hall-hero .hall-info-title {
        font-weight: 800;
        color: #2f3349;
        font-size: 1.75rem;
        text-align: left;
        width: 100%;
    }

    .selected-hall-hero .hall-overview-head {
        text-align: left;
    }

    .selected-hall-hero .hall-meta-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.75rem;
        margin-top: 0.85rem;
    }

    .selected-hall-hero .meta-item {
        border: 1px solid #edf1f7;
        background: #f9fbff;
        border-radius: 0.6rem;
        padding: 0.65rem 0.75rem;
    }

    .selected-hall-hero .meta-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #7a8797;
        margin-bottom: 0.15rem;
    }

    .selected-hall-hero .meta-value {
        font-weight: 600;
        color: #2f3349;
        line-height: 1.2;
    }

    .selected-hall-hero .hall-desc {
        margin-top: 0.85rem;
        padding: 0.75rem;
        border-radius: 0.6rem;
        background: #f7f9fc;
        border: 1px solid #edf1f7;
        color: #5d6674;
    }

    @media (max-width: 768px) {
        .selected-hall-hero .hall-photo,
        .selected-hall-hero .hall-photo-single {
            height: 220px;
        }

        .selected-hall-hero .hall-meta-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Create Booking Request</h4>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(!empty($selectedHall))
            @php
                $hallImageUrls = $selectedHall->images
                    ->pluck('image_path')
                    ->filter()
                    ->map(fn ($path) => asset('storage/' . ltrim($path, '/')))
                    ->values()
                    ->all();

                if (empty($hallImageUrls) && !empty($selectedHall->image)) {
                    $legacyPath = ltrim($selectedHall->image, '/');
                    $hallImageUrls[] = str_starts_with($legacyPath, 'halls/')
                        ? asset('storage/' . $legacyPath)
                        : asset($legacyPath);
                }
            @endphp

            <div class="card mb-4 selected-hall-hero">
                <div class="card-header">
                    <div class="hall-overview-head">
                        <h5 class="hall-info-title mb-1">{{ $selectedHall->name }}</h5>
                        <span class="badge bg-info text-dark">{{ count($hallImageUrls) }} Photo(s)</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3 align-items-center">
                        <div class="col-lg-6">
                            @if (count($hallImageUrls) > 1)
                                <div id="selectedHallCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($hallImageUrls as $index => $imageUrl)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img src="{{ $imageUrl }}" class="hall-photo" alt="{{ $selectedHall->name }} image {{ $index + 1 }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#selectedHallCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#selectedHallCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @elseif (count($hallImageUrls) === 1)
                                <img src="{{ $hallImageUrls[0] }}" class="hall-photo-single" alt="{{ $selectedHall->name }}">
                            @else
                                <div class="alert alert-light border mb-0">No hall images uploaded yet.</div>
                            @endif
                        </div>

                        <div class="col-lg-6">
                            <div class="d-flex justify-content-start mb-2">
                                <span class="badge bg-{{ $selectedHall->status === 'available' ? 'success' : 'warning' }}">
                                    Status: {{ ucfirst($selectedHall->status) }}
                                </span>
                            </div>

                            <div class="hall-meta-grid">
                                <div class="meta-item">
                                    <div class="meta-label">Campus</div>
                                    <div class="meta-value">{{ $selectedHall->campus_name ?? 'N/A' }}</div>
                                </div>
                                <div class="meta-item">
                                    <div class="meta-label">Block</div>
                                    <div class="meta-value">{{ $selectedHall->location }}</div>
                                </div>
                                <div class="meta-item">
                                    <div class="meta-label">Capacity</div>
                                    <div class="meta-value">{{ $selectedHall->capacity }} persons</div>
                                </div>
                                <div class="meta-item">
                                    <div class="meta-label">Hall ID</div>
                                    <div class="meta-value">#{{ $selectedHall->id }}</div>
                                </div>
                            </div>

                            @if(!empty($selectedHall->description))
                                <div class="hall-desc">
                                    <strong>Description:</strong> {{ $selectedHall->description }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('user.bookings.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Select Hall</label>
                    <select name="hall_id" class="form-select" required>
                        <option value="">Choose Hall</option>
                        @foreach($halls as $hall)
                            <option value="{{ $hall->id }}" {{ (string) old('hall_id', $selectedHallId ?? '') === (string) $hall->id ? 'selected' : '' }}>
                                {{ $hall->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Event Date</label>
                    <input type="date" name="event_date" value="{{ old('event_date') }}" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Start Time</label>
                    <input type="time" name="start_time" value="{{ old('start_time') }}" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
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
                                       id="user_media_{{ $value }}"
                                       name="media_requirements[]"
                                       value="{{ $value }}"
                                       {{ in_array($value, $selectedMedia, true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="user_media_{{ $value }}">{{ $label }}</label>
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
                    <i class="bx bx-save"></i> Submit Booking Request
                </button>

                <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
