<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            @include('partials.alerts')
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                        <div>
                            <h1 class="fw-bold mb-1">Productos registrados</h1>
                           
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <a href="{{ route('Productos.create') }}" class="btn btn-primary">
                            + Registrar Nuevo Producto
                        </a>

                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary">
                                Admin
                            </a>
                        @endif

                        <form action="{{ route('cerrar') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Capacidad</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($productos as $Producto)
                                    <tr>
                                        <td>{{ $Producto->id }}</td>
                                        <td>{{ $Producto->Nombre }}</td>
                                        <td>{{ $Producto->Capacidad }}</td>
                                        <td>${{ $Producto->Precio }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                @if(auth()->user()->is_admin)
                                                    <a href="{{ route('Productos.edit', $Producto) }}" class="btn btn-warning btn-sm">
                                                        Editar
                                                    </a>

                                                    <form action="{{ route('Productos.destroy', $Producto->id) }}" method="POST" class="m-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button 
                                                            type="submit" 
                                                            class="btn btn-danger btn-sm">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('Productos.edit', $Producto) }}" class="btn btn-primary btn-sm">
                                                        Comprar
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-muted py-4">
                                            No hay productos registrados.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection