<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Factura del sistema: Sales System</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/backend-plugin.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/backend.css?v=1.0.0') }}">
        <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">
    </head>
<body>

    <!-- Wrapper Start -->
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-block">
                        <div class="card-header d-flex justify-content-between bg-primary">
    
                        <!-- Back Button -->
                            <button id="back-btn" onclick="window.history.back()" class="btn btn-light mr-3" style="display:none; background-color: #007BFF; color: white;" style="display:none;" title="Volver (Alt + ←)">
                                ⬅ Atrás
                            </button>
                            <div class="iq-header-title">
                                <h4 class="card-title mb-0">Factura del sistema: Sales System</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img src="{{ asset('assets/images/logo.png') }}" class="logo-invoice img-fluid mb-3">
                                    <h5 class="mb-3">Hola, {{ $customer->name }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha del pedido</th>
                                                    <th scope="col">Estado del pedido</th>
                                                    <th scope="col">N.º de factura</th>
                                                    <th scope="col">Dirección de facturación</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ Carbon\Carbon::now()->format('M d, Y') }}</td>
                                                    <td><span class="badge" style="background-color: #ffb300; color: white;">No pagado</span></td>
                                                    <td>{{ rand(100000, 999999) }}</td>
                                                    <td>
                                                        <p class="mb-0"> 
                                                            <strong>Dirección:</strong> {{ $customer->address }}<br>
                                                            <strong>Nombre de la tienda:</strong> {{ $customer->shopname ?? '-' }}<br>
                                                            <strong>Número de teléfono:</strong> {{ $customer->phone }}<br>
                                                            <strong>Correo electrónico:</strong> {{ $customer->email }}<br>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="mb-3">Resumen del pedido</h5>
                                    <div class="table-responsive-lg">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">#</th>
                                                    <th scope="col">Artículo</th>
                                                    <th class="text-center" scope="col">Cantidad</th>
                                                    <th class="text-center" scope="col">Precio</th>
                                                    <th class="text-center" scope="col">Totales</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($content as $item)
                                                <tr>
                                                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                                    <td>
                                                        <h6 class="mb-0">{{ $item->name }}</h6>
                                                    </td>
                                                    <td class="text-center">{{ $item->qty }}</td>
                                                    <td class="text-center">${{ $item->price }}</td>
                                                    <td class="text-center"><b>${{ $item->subtotal }}</b></td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <b class="text-danger">Notas:</b>
                                    <p class="mb-0" style="text-align: justify;">Gracias por su compra. Por favor conserve esta factura como comprobante de su adquisición.Los productos tienen una garantía de 30 días a partir de la fecha de compra, siempre y cuando se presenten en su empaque original y con la factura correspondiente.No se aceptan devoluciones sin comprobante de pago. Para cualquier duda o aclaración, puede comunicarse con nuestro equipo de atención al cliente.</p>
                                </div>
                            </div>
                            <div class="row mt-4 mb-3">
                                <div class="offset-lg-8 col-lg-4">
                                    <div class="or-detail rounded">
                                        <div class="p-3">
                                            <h5 class="mb-3">Detalles del pedido</h5>
                                            <div class="mb-2">
                                                <h6>Banco: </h6>
                                                <p>{{ $customer->bank_name }}</p>
                                            </div>
                                            <div class="mb-2">
                                                <h6>N.º de cuenta: </h6>
                                                <p>{{ $customer->account_number }}</p>
                                            </div>
                                            <div class="mb-2">
                                                <h6>Fecha de vencimiento: </h6>
                                                <p>12 August 2020</p>
                                            </div>
                                            <div class="mb-2">
                                                <h6>Subtotal: </h6>
                                                <p>${{ Cart::subtotal() }}</p>
                                            </div>
                                            <div>
                                                <h6>Iva: (19%)</h6>
                                                <p>${{ Cart::tax() }}</p>
                                            </div>
                                        </div>
                                        <div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
                                            <h6>Total</h6>
                                            <h3 class="text-primary font-weight-700">${{ Cart::total() }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper End-->

    <script>
    window.addEventListener("load", (event) => {
        window.print();

        setTimeout(() => {
        document.getElementById("back-btn").style.display = "inline-block";
    }, 1000);

    });
    </script>
</body>
</html>
