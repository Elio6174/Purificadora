<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
</head>
<body>
    <h1>Registrar producto</h1>    

<!--Se usa la ruta Libro.Store por que asi se llama el metodo para enviarlo a la BD en LibroController  -->
<form action="{{route('Productos.store')}}" method="POST">
    <!--Indicar token de seguridad de Laravel-->

    @csrf
    <input type="text" name="Nombre" placeholder="Nombre">
    <br><br>
    <input type="text" name="Capacidad" placeholder="Capacidad">
    <br><br>
    <input type="number" name="Precio" placeholder="Precio">
    <br><br>

    <button type="submit"> Guardar</button>
   
</form>

<a href="{{route('Productos.index') }}">  
    <button>Ver productos</button>
</a>
     

</body>
</html>