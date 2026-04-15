<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig; 
use MercadoPago\Client\Preference\PreferenceClient;

class MercadoPagoController extends Controller
{
    public function pago($id)
    {
        $producto = Productos::find($id);

        $accessToken = env('MERCADO_PAGO_ACCESS_TOKEN');
        MercadoPagoConfig::setAccessToken($accessToken);

        $client = new PreferenceClient();
        $preference = $client->create([
        "items"=> array(
            array(
            "title" => $producto->Nombre." - ". $producto->Capacidad,
            "quantity" => 1,
            "unit_price" => (float)$producto->Precio,
            "currency_id" => "MXN"
            )
        )
        ]);

        // Retornamos el ID para usarlo en el HTML
        return view('Productos.Pago', ['preferenceId' => $preference->id, 'producto' => $producto]);
    }
}
