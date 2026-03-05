<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    <h1>Productos registrados</h1>
    
    <a href="{{ route('Productos.create') }}">
        <button class="btn btn-primary" style="margin-bottom: 15px;">
            + Registrar Nuevo Producto
        </button>

        <form action="{{route('cerrar')}}" method="POST" >
                @csrf
                <button class="btn btn-danger">Cerrar sesion</button>
            
            </form>
    </a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Capacidad</th>
                <th>Precio</th>
                <th>Acciones</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $Producto)
            <tr>
                <td>{{ $Producto->id }}</td> 
                <td>{{ $Producto->Nombre }}</td>
                <td>{{ $Producto->Capacidad }}</td>
                <td>{{ $Producto->Precio }}</td>
                <td>
                    <a href="{{ route('Productos.edit', $Producto) }}">
                        <button class="btn btn-warning">Editar
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </a>

                    <form action="{{ route('Productos.destroy', $Producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</body>
</html>