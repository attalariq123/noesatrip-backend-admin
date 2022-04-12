@extends('layouts.app')

@section('content')
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">{{ __('Add Orders') }}</h1>

        <div class="row">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-primary alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ $message }}
                </div>
                @endif


                <div class="card">

                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf

                        <div class="card-body col-lg-8">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">User ID</span>
                                </div>
                                <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" placeholder="{{ __('User ID') }}" onfocus='this.size=6;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required>
                                    @foreach ($idUser as $user)
                                        <option value="{{ $user->id }}">{{ $user->id . " - " . $user->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="number" name="user_id" class="form-control @error('user_id') is-invalid @enderror" placeholder="{{ __('User ID') }}" required> --}}
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
                                <select class="form-control @error('dest_id') is-invalid @enderror" name="dest_id" placeholder="{{ __('Destination ID') }}" onfocus='this.size=6;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required>
                                    @foreach ($idDest as $dest)
                                        <option value="{{ $dest->id }}">{{ $dest->id . " - " . $dest->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="number" name="dest_id" class="form-control @error('dest_id') is-invalid @enderror" placeholder="{{ __('Destination ID') }}" required> --}}
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
                                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" placeholder="{{ __('Start Date') }}" required>
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
                                <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" placeholder="{{ __('End Date') }}" required>
                            </div>
                            @error('end_date')
                            <div class="form-group custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Ticket Qty</span>
                                </div>
                                <input type="number" name="ticket_qty" class="form-control @error('ticket_qty') is-invalid @enderror" placeholder="{{ __('Ticket Quantity') }}" required>
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