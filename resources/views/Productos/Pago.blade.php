<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodo de Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body class="bg-light">

<div class="container">
    <div class="row min-vh-100 align-items-center justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 text-center">
                    
                    <h5 class="card-title mb-3">Resumen de Pago</h5>
                    
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">{{ $producto->Nombre." - ".$producto->Capacidad ?? 'Producto' }}</span>
                        <span class="fw-bold">${{ number_format($producto->Precio ?? 0, 2) }}</span>
                    </div>
                    
                    <hr class="my-3">
                    
                    <div class="d-flex justify-content-between mb-4">
                        <span class="h5">Total</span>
                        <span class="h5 text-primary">${{ number_format($producto->Precio ?? 0, 2) }} MXN</span>
                    </div>

                    <div id="walletBrick_container"></div>

                    <a href="{{ url()->previous() }}" class="btn btn-link btn-sm text-muted mt-3">Cancelar</a>
                    
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    const mp = new MercadoPago("{{ env('MERCADO_PAGO_PUBLIC_KEY') }}", {
        locale: 'es-MX'
    });
    const bricksBuilder = mp.bricks();

    bricksBuilder.create("wallet", "walletBrick_container", {
        initialization: {
            preferenceId: "{{ $preferenceId }}",
            redirectMode: 'modal'
        },
        customization: {
            visual: {
                borderRadius: '6px',
            }
        }
    });
</script>

</body>
</html>