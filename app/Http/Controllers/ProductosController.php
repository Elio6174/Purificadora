<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductosController extends Controller
{
    /**
     * CONSULTAR 
     */
     public function index()
    { 
        // Obtener datos de la tabla en la BD*
        $productos = Productos::all();
       
        return view('Productos.Consulta', compact('productos'));  //Enviar los datos a la vista "Index"
       
    }

    /**
     * INSERTAR
     */
    public function create()
    {
        return view('Productos.Registro');
    }

    /**
     * Guardar en la base de datos 
     */
    public function store(Request $request)
    {
        //Enviar datos a la BD 
        Productos::create([
        'Nombre'=>$request-> Nombre,
        'Capacidad' => $request-> Capacidad,
        'Precio' => $request-> Precio,
    
        ]);
            return redirect()->route('Productos.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Productos = Productos::findOrFail($id);
        #Mandar la vista junto a la informacion del libro 
        return view('Productos.Edit', compact('Productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'Nombre' => 'required ', 
            'Capacidad' => 'required ', 
            'Precio' => 'required ',         

        ]);

        $Productos = Productos::findOrFail($id);

         //Enviar todos los datos para actualizar 
        $Productos -> update($request -> all()); 
        //Redireccionar al usuario a los libros 
        return redirect()-> route('Productos.index')-> with('success', 'Registro actualizado :DD  ');

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Productos::findOrFail($id);
        $producto->delete();
        return redirect()->route('Productos.index')->with('success', '¡El producto fue eliminado correctamente!');
    }
}
