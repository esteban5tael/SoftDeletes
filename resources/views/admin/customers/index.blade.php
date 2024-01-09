@extends('adminlte::page') {{-- Extiende la plantilla proporcionada por AdminLTE --}}

@section('title') {{-- Sección de título --}}
    {{ config('app.name') }} {{-- Obtiene el nombre de la aplicación desde la configuración --}}
@stop

@section('content_header') {{-- Encabezado de contenido --}}
    <h1 class="text-center">
        Customers {{-- Título principal --}}
    </h1>
@stop

@section('content') {{-- Contenido principal --}}
    <div class="container-fluid">
        {{-- Contenedor principal --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {{-- Encabezado de la tarjeta --}}
                        {{-- Botones para mostrar registros eliminados o restaurar todos --}}
                        <div class="container mb-3">
                            @if (request()->has('view_deleted'))
                                <a class="btn btn-info btn-sm" href="{{ route('admin.customers.index') }}">List Records</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.customers.restore_all') }}">Restore
                                    All</a>
                            @else
                                <a class="btn btn-danger btn-sm"
                                    href="{{ route('admin.customers.index', ['view_deleted' => 'DeletedRecords']) }}">View
                                    Deleted
                                    Records</a>
                            @endif
                        </div>
                        {{-- Título y botón "Create New" --}}
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Customer') }} {{-- Título del contenido --}}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('admin.customers.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }} {{-- Botón para crear un nuevo registro --}}
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Mostrar mensaje de éxito si existe --}}
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-1">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    {{-- Cuerpo de la tarjeta --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- Tabla para mostrar los datos de los clientes --}}
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Recorrer y mostrar datos de los clientes --}}
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->id }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>
                                                {{-- Formulario para acciones de mostrar, editar y eliminar --}}
                                                <form action="{{ route('admin.customers.destroy', $customer->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    {{-- Botones de acciones dependiendo de si se muestran registros eliminados --}}
                                                    @if (request()->has('view_deleted'))
                                                        <a class="btn btn-secondary btn-sm"
                                                            href="{{ route('admin.customers.restore', $customer) }}">
                                                            <i class="fas fa-trash-restore"></i>
                                                            Restore</a>
                                                    @else
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('admin.customers.show', $customer->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('admin.customers.edit', $customer->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure?')"><i
                                                                class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
