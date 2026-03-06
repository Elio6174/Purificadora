<?php
use Illiminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('Productos.index');
});


// Usar las rutas con los nombres de los metodos del contralodor (Protegido por el inicio de sesion)
Route::middleware(['auth'])->group(function () {
    Route::resource('Productos', ProductosController::class);
});
//Route::resource('Productos', ProductosController::class);

Route:: get('/Productos/{Productos}/Edit',[
    ProductosController::class,'Edit'
]) ->name('Productos.edit');


//Ruta para actualizar el registro(PUT) 

Route::put('/Productos/{Productos}', [
    ProductosController::class, 'update' 
])-> name('Productos.update');


//Ruta para regresar la vista del registro
Route:: get('/registro',[
    AuthController:: class, 'registerForm'

])->name('registro');//El metodo de html depende de su funcion, "GET" funciona para mostrar 

#Ruta para guardar el registro de ususario 
Route::post('/registro', [
    AuthController::class, 'register'

])-> name('registro.store');



//Ruta para regresar la vista del inicio de sesion 
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');
        
//Ruta para iniciar sesion 
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');


//Ruta para cerrar sesion 

Route::post('/cerrar',[
    AuthController::class,'logout'
])->name('cerrar');

