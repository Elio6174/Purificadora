<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;



class AuthController extends Controller
{
    //Metodo para regresar visar de formulario de registro 
    public function registerForm(){
        return view('auth.register');


    }

    //Metodo para guardar la informacion de registro 
    public function register(Request $request ){
        ['Nombre','Capacidad','Precio'];  
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);


        //Guardar la informacion en la base de datos 
        $user = User::create([
            "name" => $request ->name,
            "email" => $request ->email,
            "phone" => $request ->phone,
            "password" => Hash::make($request->password),



        ]);

        //Inicar sesion de forma automatica 
        Auth::login($user);


        return redirect()->route('Productos.index');
    }
    //Metod para regresar la vista del inicio de sesion
    public function loginForm(){
        return view('auth.login');

    }

    //Metodo para iniciar sesion 
    public function login(Request $request){
        //Validar la informcaion del formulario
        $data = $request -> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Intentar el inico de sesion 
        if(Auth::attempt($data)){

            //Iniciar sesion y redireccionar al usuario con sesion activa
            $request -> session() -> regenerate();
            return redirect()->route('Productos.index');
        
            }
        return back()->withErrors([
            'email' => 'Datos incorrectos',
            
        ]);


    }

    public function logout(Request $request){

        //Funcion para cerrar sesion 
        Auth::logout();

        //Cierre de credenciales en la sesiones 
        $request -> session() -> invalidate(); 
        $request -> session() -> regenerateToken();

        return redirect('/acceso');

    }




}
