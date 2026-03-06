<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANEL DEL ADIMINISTRADOR</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    
    <h1>Panel del adminisrador</h1>

    <div class="mt-4">
        <a href="{{ route('registro') }}" class="btn btn-primary">
            + Agregar usuario
        </a>
    </div>




    @endsection
    





</body>
</html>