<!DOCTYPE html>
<html>
    <head>
        <title>Seleccionar Método de Pago</title>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
    </head>
    <body>
        <h2>Selecciona cómo quieres pagar $1.00</h2>
        
        <div id="walletBrick_container"></div>

        <script>
        const mp = new MercadoPago("{{ env('MERCADO_PAGO_PUBLIC_KEY') }}", {
            locale: 'es-MX' 
        });
        
        const bricksBuilder = mp.bricks();

        // 2. Renderizamos el botón (Wallet)
        bricksBuilder.create("wallet", "walletBrick_container", {
            initialization: {
                preferenceId: "{{ $preferenceId }}",
                redirectMode: 'modal'
            },
            customization: {
                texts: {
                    valueProp: 'smart_option',
                },
            },
        });
        </script>
    </body>
</html>