@extends('layouts/contentNavbarLayout')

@section('title', 'Revenue Report')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Revenue Report</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Total Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($revenues as $revenue)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($revenue->date)->format('M d, Y') }}</td>
                                    <td><strong>₱{{ number_format($revenue->total, 2) }}</strong></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $revenues->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
