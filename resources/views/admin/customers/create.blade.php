@extends('adminlte::page')

@section('title')
	{{ config('app.name') }}
@stop

@section('content_header')
    <h1 class="text-center">
        {{ __('Create') }} Customer
    </h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Customer</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.customers.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.customers.form')

                        </form>
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