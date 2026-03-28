<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>

        .container{
            font-family:Arial;
            background: #f4f4f4;
            padding: 20px; 

        }
        .content{
            background: #ffff;
            padding: 20px;
            border-radius: 10px;

        }

        .btn{
            background: blue;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 7px;
        }
    </style>
</head>
<body>

    <center>
        <div class="container">
            <div class="content">
                <h1> Nuevo inicio de sesión</h1>
                <p> Se ha detectado nueva actividad en la cuneta.</p>

                <a href="{{ route('acceso') }}" class="btn" style="color:white;">
                    Verificar inicio de sesión
                </a>

                <p>
                    Sino fuiste tú, solicita un cambio de contraseña <br>
                    al administrador del sistema.
                </p>
            </div>
        </div>
    </center>
        
</body>
</html>