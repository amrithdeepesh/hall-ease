@extends('layouts/contentNavbarLayout')

@section('title', 'Hall Details')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Hall Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td class="text-muted">Name</td>
                            <td><strong>{{ $hall->name }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Location</td>
                            <td><strong>{{ $hall->location }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Capacity</td>
                            <td><strong>{{ $hall->capacity }} persons</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Price per Day</td>
                            <td><strong>₱{{ number_format($hall->price_per_day, 2) }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Status</td>
                            <td>
                                <span class="badge bg-{{ $hall->status === 'available' ? 'success' : 'warning' }}">
                                    {{ ucfirst($hall->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">Description</td>
                            <td><small>{{ $hall->description ?? 'No description' }}</small></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.halls.edit', $hall) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin.halls.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Hall Images ({{ count($images) }})</h6>
                </div>
                <div class="card-body">
                    @if (count($images) > 0)
                        <div class="row g-2">
                            @foreach ($images as $image)
                                <div class="col-6">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid rounded" alt="Hall Image" />
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center">No images uploaded</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
