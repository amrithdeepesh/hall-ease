@extends('layouts/contentNavbarLayout')

@section('title', 'Reports')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-title mb-2">Total Bookings</h6>
                            <h3 class="mb-0">{{ $total_bookings }}</h3>
                        </div>
                        <i class="bx bx-check-circle text-info" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-title mb-2">Customers</h6>
                            <h3 class="mb-0">{{ $total_customers }}</h3>
                        </div>
                        <i class="bx bx-user text-warning" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Detailed Reports</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('admin.reports.revenue') }}" class="list-group-item list-group-item-action">
                            <h6 class="mb-1">Revenue Report</h6>
                            <p class="mb-0 text-muted">View detailed revenue by date</p>
                        </a>
                        <a href="{{ route('admin.reports.bookings') }}" class="list-group-item list-group-item-action">
                            <h6 class="mb-1">Bookings Report</h6>
                            <p class="mb-0 text-muted">View all bookings and their status</p>
                        </a>
                        <a href="{{ route('admin.reports.halls') }}" class="list-group-item list-group-item-action">
                            <h6 class="mb-1">Halls Report</h6>
                            <p class="mb-0 text-muted">View hall usage and statistics</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
