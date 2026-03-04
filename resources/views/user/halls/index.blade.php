@extends('layouts/contentNavbarLayout')

@section('title', 'Browse Halls')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="mb-1">Browse Halls by Campus</h4>
            <p class="text-muted mb-0">Select a campus and block to view available halls.</p>
        </div>
    </div>

    <div class="row">
        @forelse ($campusGroups as $campus => $blocks)
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">{{ $campus }}</h5>
                    </div>
                    <div class="card-body">
                        @if ($blocks->isNotEmpty())
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($blocks as $block)
                                    <a href="{{ route('user.halls.block', ['campus' => $campus, 'block' => $block]) }}"
                                       class="btn btn-outline-primary btn-sm">
                                        {{ $block }}
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted mb-0">No blocks available.</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info mb-0">
                    No campus halls configured yet.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
