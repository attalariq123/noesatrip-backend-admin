@extends('layouts.app')

@section('content')
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">{{ __('Edit Orders') }}</h1>

        <div class="row">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-primary alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ $message }}
                </div>
                @endif


                <div class="card">

                    <form action="{{ route('orders.update', $order) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body col-lg-8">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">User ID</span>
                                </div>
                                <input type="number" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{$order->user_id}}" disabled required>
                            </div>
                            @error('user_id')
                            <div class="form-group custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Destination ID</span>
                                </div>
                                <input type="number" name="dest_id" class="form-control @error('dest_id') is-invalid @enderror" value="{{$order->destination_id}}" disabled required>
                            </div>
                            @error('dest_id')
                            <div class="form-group custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Start Date</span>
                                </div>
                                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{$order->start_date}}" required>
                            </div>
                            @error('start_date')
                            <div class="form-group custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">End Date</span>
                                </div>
                                <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{$order->end_date}}" required>
                            </div>
                            @error('end_date')
                            <div class="form-group custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Ticket Quantity</span>
                                </div>
                                <input type="number" name="ticket_qty" class="form-control @error('ticket_qty') is-invalid @enderror" value="{{$order->ticket_quantity}}" required>
                            </div>
                            @error('ticket_qty')
                            <div class="form-group custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection