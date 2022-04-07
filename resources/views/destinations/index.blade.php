@extends('layouts.app')

@section('custom_styles')
<link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold">Destinations</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('destinations.create') }}" class="btn btn-primary m-0 font-weight-bold">Add Destination</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Rating</th>
                            <th>Total Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($destinations as $des)
                        <tr>
                            <td>{{ $des->kode }}</td>
                            <td>{{ $des->name }}</td>
                            <td class="d-inline-block text-truncate" style="max-width: 460px;">{{ $des->description }}</td>
                            <td>Rp {{ $des->price }}</td>
                            <td>{{ $des->overall_rating }}</td>
                            <td>{{ $des->total_review }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@section('custom_scripts')
<!-- Page level custom scripts -->
<script src="{{ asset('js/datatables-demo.js') }}"></script>
@endsection