<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')    

    <h1>REGISTRO</h1>

    <form action="{{route('registro.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nombre" class= "form-control" required>
        <br>
        <input type="text" name="email" placeholder="Correo" class= "form-control" required>
        <br>
        <input type="text" name="phone" placeholder="Telefono" class= "form-control" required>
        <br>
        <input type="text" name="password" placeholder="Contraseña" class= "form-control" required>
        <br>
        <input type="text" name="password_confirmation" placeholder="Confirmar contra" class= "form-control" required>
        <br>

        <button type="submit" class="btn btn-success"> Guardar </button>
    </form>

     @if(auth()->user()->is_admin)
     
        <div class="form-check">
            <input type="checkbox" name="is_admin" value="1" >
            <label for="is_admin"> Es administrador</label>
        </div>                     
     

     @endif



    
        <br>
        
        
    @endsection
</body>
</html>