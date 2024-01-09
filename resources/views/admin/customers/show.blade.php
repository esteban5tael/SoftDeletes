@extends('adminlte::page')

@section('title')
	{{ config('app.name') }}
@stop

@section('content_header')
    <h1 class="text-center">
        {{ __('Show') }} Customer        
    </h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Customer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.customers.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $customer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $customer->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $customer->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop

    @section('css')
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @stop
    
    @section('js')
        {{-- <script> console.log('Hi!'); </script> --}}
    @stop