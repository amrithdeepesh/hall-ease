@extends('layouts/contentNavbarLayout')

@section('title', 'Security Settings')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('admin.settings.index') }}" class="list-group-item list-group-item-action">
                    <i class="bx bx-cog"></i> General
                </a>
                <a href="{{ route('admin.settings.email') }}" class="list-group-item list-group-item-action">
                    <i class="bx bx-envelope"></i> Email
                </a>
                <a href="{{ route('admin.settings.security') }}" class="list-group-item list-group-item-action active">
                    <i class="bx bx-lock"></i> Security
                </a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Security Settings</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        Security settings management coming soon.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
