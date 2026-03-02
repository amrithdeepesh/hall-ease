@extends('layouts/contentNavbarLayout')

@section('title', 'Hall Management')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title">All Halls</h5>
                        <a href="{{ route('admin.halls.create') }}" class="btn btn-primary">
                            <i class="bx bx-plus"></i> Add Hall
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Capacity</th>
                                    <th>Price/Day</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($halls as $hall)
                                    <tr>
                                        <td>{{ $hall->name }}</td>
                                        <td>{{ $hall->location }}</td>
                                        <td>{{ $hall->capacity }} persons</td>
                                        <td>₱{{ number_format($hall->price_per_day, 0) }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $hall->status === 'available' ? 'success' : 'warning' }}">
                                                {{ ucfirst($hall->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.halls.show', $hall) }}">View</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.halls.edit', $hall) }}">Edit</a>
                                                    <form action="{{ route('admin.halls.destroy', $hall) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger"
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No halls found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $halls->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
