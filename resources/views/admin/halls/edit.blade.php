@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Hall')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit Hall</h5>
                </div>
                <form action="{{ route('admin.halls.update', $hall) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Hall Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $hall->name) }}" required />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="location" class="form-label">Location *</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $hall->location) }}" required />
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="capacity" class="form-label">Capacity *</label>
                                    <input type="number" class="form-control @error('capacity') is-invalid @enderror" id="capacity" name="capacity" value="{{ old('capacity', $hall->capacity) }}" required />
                                    @error('capacity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="price_per_day" class="form-label">Price per Day (₱) *</label>
                                    <input type="number" step="0.01" class="form-control @error('price_per_day') is-invalid @enderror" id="price_per_day" name="price_per_day" value="{{ old('price_per_day', $hall->price_per_day) }}" required />
                                    @error('price_per_day')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $hall->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="available" {{ old('status', $hall->status) === 'available' ? 'selected' : '' }}>Available</option>
                                <option value="maintenance" {{ old('status', $hall->status) === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.halls.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update Hall</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
