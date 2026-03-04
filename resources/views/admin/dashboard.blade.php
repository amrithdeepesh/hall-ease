@extends('layouts/contentNavbarLayout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Welcome Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-8">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-3">Welcome to HallEase Admin Dashboard! 👋</h5>
                            <p class="text-muted mb-4">
                                Manage your event halls, bookings, and customers all in one place. Get an overview of your key metrics below.
                            </p>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary btn-sm">
                                    <i class="bx bx-calendar"></i> View Bookings
                                </a>
                                <a href="{{ route('admin.halls.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bx bx-building"></i> Manage Halls
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/man-with-laptop.png') }}" alt="Welcome" data-app-dark-img="{{ asset('assets/img/illustrations/man-with-laptop-dark.png') }}" data-app-light-img="{{ asset('assets/img/illustrations/man-with-laptop.png') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Statistics -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted text-uppercase font-weight-bold" style="font-size: 0.75rem;">Total Halls</span>
                            <h3 class="mb-0 mt-2">{{ $total_halls }}</h3>
                        </div>
                        <div class="text-center" style="background: white; padding: 12px 15px; border-radius: 8px;">
                            <i class="bx bx-buildings" style="font-size: 2.5rem; color: #0d6efd;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted text-uppercase font-weight-bold" style="font-size: 0.75rem;">Total Users</span>
                            <h3 class="mb-0 mt-2">{{ $total_users }}</h3>
                        </div>
                        <div class="text-center" style="background: white; padding: 12px 15px; border-radius: 8px;">
                            <i class="bx bx-user-circle" style="font-size: 2.5rem; color: #198754;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted text-uppercase font-weight-bold" style="font-size: 0.75rem;">Total Bookings</span>
                            <h3 class="mb-0 mt-2">{{ $total_bookings }}</h3>
                        </div>
                        <div class="text-center" style="background: white; padding: 12px 15px; border-radius: 8px;">
                            <i class="bx bx-calendar-event" style="font-size: 2.5rem; color: #0dcaf0;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted text-uppercase font-weight-bold" style="font-size: 0.75rem;">Total Events</span>
                            <h3 class="mb-0 mt-2">{{ $total_events }}</h3>
                        </div>
                        <div class="text-center" style="background: white; padding: 12px 15px; border-radius: 8px;">
                            <i class="bx bx-party" style="font-size: 2.5rem; color: #6f42c1;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Quick Actions & Management -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">
                        <span class="badge" style="background: white; color: #ffc107; font-size: 2.0rem; display: inline-block; margin-right: 8px;">⚡</span><span style="font-size: 2.0rem; font-weight: 700;">Quick Actions</span>
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('admin.halls.create') }}" class="list-group-item list-group-item-action px-4 py-3 d-flex align-items-center border-0">
                            <span style="background: white; padding: 8px 10px; border-radius: 6px; display: flex; align-items: center; justify-content: center;"><i class="bx bx-plus-circle text-primary" style="font-size: 1.3rem;"></i></span>
                            <div>
                                <div class="fw-bold">Add New Hall</div>
                                <small class="text-muted">Create a new event hall</small>
                            </div>
                        </a>
                        <a href="{{ route('admin.bookings.create') }}" class="list-group-item list-group-item-action px-4 py-3 d-flex align-items-center border-0">
                            <span style="background: white; padding: 8px 10px; border-radius: 6px; display: flex; align-items: center; justify-content: center;"><i class="bx bx-plus-circle text-success" style="font-size: 1.3rem;"></i></span>
                            <div>
                                <div class="fw-bold">Create Booking</div>
                                <small class="text-muted">Book an event for a customer</small>
                            </div>
                        </a>
                        <a href="{{ route('admin.staff.create') }}" class="list-group-item list-group-item-action px-4 py-3 d-flex align-items-center border-0">
                            <span style="background: white; padding: 8px 10px; border-radius: 6px; display: flex; align-items: center; justify-content: center;"><i class="bx bx-plus-circle text-info" style="font-size: 1.3rem;"></i></span>
                            <div>
                                <div class="fw-bold">Add Staff Member</div>
                                <small class="text-muted">Manage staff</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">
                        <span class="badge" style="background: white; color: #0dcaf0; font-size: 2.0rem; display: inline-block; margin-right: 8px;">⚙️</span><span style="font-size: 2.0rem; font-weight: 700;">Management</span>
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('admin.halls.index') }}" class="list-group-item list-group-item-action px-4 py-3 d-flex align-items-center justify-content-between border-0">
                            <div class="d-flex align-items-center">
                                <span style="background: white; padding: 8px 10px; border-radius: 6px; display: flex; align-items: center; justify-content: center; margin-right: 12px;"><i class="bx bx-building text-primary" style="font-size: 1.3rem;"></i></span>
                                <div>
                                    <div class="fw-bold">All Halls</div>
                                    <small class="text-muted">View & manage event halls</small>
                                </div>
                            </div>
                            <i class="bx bx-chevron-right text-muted"></i>
                        </a>
                        <a href="{{ route('admin.customers.index') }}" class="list-group-item list-group-item-action px-4 py-3 d-flex align-items-center justify-content-between border-0">
                            <div class="d-flex align-items-center">
                                <span style="background: white; padding: 8px 10px; border-radius: 6px; display: flex; align-items: center; justify-content: center; margin-right: 12px;"><i class="bx bx-user text-success" style="font-size: 1.3rem;"></i></span>
                                <div>
                                    <div class="fw-bold">Customers</div>
                                    <small class="text-muted">Manage customer accounts</small>
                                </div>
                            </div>
                            <i class="bx bx-chevron-right text-muted"></i>
                        </a>
                        <a href="{{ route('admin.bookings.index') }}" class="list-group-item list-group-item-action px-4 py-3 d-flex align-items-center justify-content-between border-0">
                            <div class="d-flex align-items-center">
                                <span style="background: white; padding: 8px 10px; border-radius: 6px; display: flex; align-items: center; justify-content: center; margin-right: 12px;"><i class="bx bx-calendar text-info" style="font-size: 1.3rem;"></i></span>
                                <div>
                                    <div class="fw-bold">Bookings</div>
                                    <small class="text-muted">View & manage bookings</small>
                                </div>
                            </div>
                            <i class="bx bx-chevron-right text-muted"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Info -->
    <div class="row">
        <div class="col-12">
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <i class="bx bx-info-circle me-2" style="font-size: 1.3rem;"></i>
                <div>
                    <strong>Pro Tip:</strong> Use the menu on the left to access all features and manage your hall business efficiently!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

