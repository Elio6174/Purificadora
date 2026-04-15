<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig; 
use MercadoPago\Client\Preference\PreferenceClient;

class MercadoPagoController extends Controller
{
    public function pago($producto)
    {
        $accessToken = env('MERCADO_PAGO_ACCESS_TOKEN');
        MercadoPagoConfig::setAccessToken($accessToken);

        $client = new PreferenceClient();
        $preference = $client->create([
        "items"=> array(
            array(
            "title" => "Mi producto",
            "quantity" => 1,
            "unit_price" => 2000
            )
        )
        ]);

        // Retornamos el ID para usarlo en el HTML
        return view('Productos.Pago', ['preferenceId' => $preference->id]);
    }
}
