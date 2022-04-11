@extends('layouts.app')

@section('content')
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">{{ __('Edit Event') }}</h1>

        <div class="row">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-primary alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ $message }}
                </div>
                @endif


                <div class="card">

                    <form action="{{ route('events.update', $event->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body col-lg-8">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Destination ID</span>
                                </div>
                                <select class="form-control @error('dest_id') is-invalid @enderror" name="dest_id" placeholder="{{ __('Destination ID') }}" onfocus='this.size=6;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required>
                                    @foreach ($idName as $id)
                                        <option value="{{ $id->id }}">{{ $id->id . " - " . $id->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="number" name="dest_id" class="form-control @error('dest_id') is-invalid @enderror" placeholder="{{ __('Destination ID') }}" value="{{ $event->destination_id }}" required> --}}
                            </div>
                            @error('dest_id')
                            <div class="form-group custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Name</span>
                                </div>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" value="{{ $event->name }}" required>
                            </div>
                            @error('name')
                            <div class="form-group custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Description</span>
                                </div>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4" cols="50" placeholder="{{ __('Description') }}" required>{{ $event->description }}</textarea>
                            </div>
                            @error('description')
                            <div class="form-group custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Duration</span>
                                </div>
                                <input type="number" name="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="{{ __('Duration in minute') }}" value="{{ $event->duration }}" required>
                            </div>
                            @error('duration')
                            <div class="form-group custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection