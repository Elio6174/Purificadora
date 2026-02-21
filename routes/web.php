<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('Productos.index');
});

Route::resource('Productos', ProductosController::class);

Route:: get('/Productos/{Productos}/Edit',[
    ProductosController::class,'Edit'
]) ->name('Productos.edit');


//Ruta para actualizar el registro(PUT) 

Route::put('/Productos/{Productos}', [
    ProductosController::class, 'update' 
])-> name('Productos.update');
