<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('_productos','productos'); #Se cambia el nombre, primero el nombre actual y despues como se llamara 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos','_productos');  #Aqui es al reves, primero el nuevo nombre y despues el nombr pasado 
    }
};
