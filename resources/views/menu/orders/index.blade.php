@extends('layouts.app')

@section('custom_styles')
<link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold">Orders</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('orders.create') }}" class="btn btn-primary m-0 font-weight-bold">Add Order</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Dest ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Ticket Qty</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $ord)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ord->user_id }}</td>
                            <td>{{ $ord->destination_id }}</td>
                            <td>{{ $ord->start_date }}</td>
                            <td>{{ $ord->end_date }}</td>
                            <td>{{ $ord->ticket_quantity }}</td>
                            <td>{{ $ord->total_amount }}</td>
                            <td>{{ $ord->payment_status }}</td>
                            <td>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu shadow animated--fade-in" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('orders.edit', $ord->id) }}">
                                            <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-600"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('orders.destroy', $ord->id) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="dropdown-item">
                                                <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-600"></i>
                                                Delete
                                            </button>
                                        </form>

                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-600"></i>
                                            Show
                                        </a>
                                    </div>
                                </div>
                            </td>
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