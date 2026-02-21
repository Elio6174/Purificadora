<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //Indicar cuales son los campos que el usuario si puede cambiar 
    protected $fillable = ['Nombre','Capacidad','Precio'];  



}
