@extends('layouts/contentNavbarLayout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Welcome to Hall-Ease Admin Dashboard! 👋</h5>
                            <p class="mb-4">
                                Manage your event halls, bookings, customers, and payments all in one place.
                            </p>
                            <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-label-primary">View All Bookings</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/man-with-laptop.png') }}" height="140" alt="View Badge User" data-app-dark-img="{{ asset('assets/img/illustrations/man-with-laptop-dark.png') }}" data-app-light-img="{{ asset('assets/img/illustrations/man-with-laptop.png') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-info">
                                    <p class="card-text">Total Revenue</p>
                                    <span class="h3 d-block">₹{{ number_format($total_revenue, 0) }}</span>
                                </div>
                                <div class="card-icon">
                                    <i class="bx bx-trending-up"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-info">
                                    <p class="card-text">Bookings</p>
                                    <span class="h3 d-block">{{ $total_bookings }}</span>
                                </div>
                                <div class="card-icon">
                                    <i class="bx bx-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-title mb-2">Total Halls</h6>
                            <h3 class="mb-0">{{ $total_halls }}</h3>
                        </div>
                        <i class="bx bx-buildings text-primary" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-title mb-2">Total Users</h6>
                            <h3 class="mb-0">{{ $total_users }}</h3>
                        </div>
                        <i class="bx bx-user text-success" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-title mb-2">Confirmed</h6>
                            <h3 class="mb-0">{{ $confirmed_bookings }}</h3>
                        </div>
                        <i class="bx bx-check-circle text-info" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-title mb-2">Pending</h6>
                            <h3 class="mb-0">{{ $pending_bookings }}</h3>
                        </div>
                        <i class="bx bx-time text-warning" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('admin.halls.create') }}" class="list-group-item list-group-item-action">
                            <i class="bx bx-plus"></i> Add New Hall
                        </a>
                        <a href="{{ route('admin.bookings.create') }}" class="list-group-item list-group-item-action">
                            <i class="bx bx-plus"></i> Create New Booking
                        </a>
                        <a href="{{ route('admin.staff.create') }}" class="list-group-item list-group-item-action">
                            <i class="bx bx-plus"></i> Add Staff Member
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Manage</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('admin.halls.index') }}" class="list-group-item list-group-item-action">
                            <i class="bx bx-building"></i> All Halls
                        </a>
                        <a href="{{ route('admin.customers.index') }}" class="list-group-item list-group-item-action">
                            <i class="bx bx-user"></i> Customers
                        </a>
                        <a href="{{ route('admin.reports.index') }}" class="list-group-item list-group-item-action">
                            <i class="bx bx-bar-chart"></i> Reports
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
