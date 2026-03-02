@extends('layouts/contentNavbarLayout')

@section('title', 'Settings')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('admin.settings.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
                    <i class="bx bx-cog"></i> General
                </a>
                <a href="{{ route('admin.settings.email') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.settings.email') ? 'active' : '' }}">
                    <i class="bx bx-envelope"></i> Email
                </a>
                <a href="{{ route('admin.settings.security') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.settings.security') ? 'active' : '' }}">
                    <i class="bx bx-lock"></i> Security
                </a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">General Settings</h5>
                </div>
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="app_name" class="form-label">Application Name</label>
                            <input type="text" class="form-control" id="app_name" name="app_name" value="{{ $settings['app_name'] ?? 'Hall-Ease' }}" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="app_email" class="form-label">Support Email</label>
                            <input type="email" class="form-control" id="app_email" name="app_email" value="{{ $settings['app_email'] ?? '' }}" />
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
