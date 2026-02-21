<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <h1>Editar garrafon: {{ $Productos->Nombre }}</h1>
        <br>
        <form action="{{ route('Productos.update', $Productos) }}" method="POST">
            @csrf 
            @method('PUT')            
            <input type="text" name="Nombre" value="{{ $Productos->Nombre }}" placeholder="Nombre" class="form-control">
            <br><br>
            <input type="text" name="Capacidad" value="{{ $Productos->Capacidad }}" placeholder="Capacidad" class="form-control">
            <br><br>
            <input type="text" name="Precio" value="{{ $Productos->Precio }}" placeholder="Precio" class="form-control">
            <br><br>            
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
        <br>
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('Productos.index') }}">
                <button class="btn btn-danger">Regresar</button>
            </a>
        </div>
    @endsection
</body>
</html>