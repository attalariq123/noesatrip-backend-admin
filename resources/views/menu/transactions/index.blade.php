@extends('layouts.app')

@section('custom_styles')
<link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold">Transactions</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <a href="{{ route('events.create') }}" class="btn btn-primary m-0 font-weight-bold">Add Events</a>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Confirmation Date</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach ($transactions as $trans)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $trans->user_id }}</td>
                            <td>{{ $trans->confirmation_date }}</td>
                            <td>{{ $trans->total . ',00'}}</td>
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