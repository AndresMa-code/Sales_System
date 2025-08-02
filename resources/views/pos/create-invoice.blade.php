@extends('dashboard.body.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-block">
                <div class="card-header d-flex justify-content-between bg-primary">
                    <div class="iq-header-title">
                        <h4 class="card-title mb-0">Factura del sistema: Sales System</h4>
                    </div>

                        <div class="invoice-btn d-flex">
                        <!-- Back button -->
                            <button onclick="window.history.back()" class="btn btn-light mr-2" 
                                    style="background-color: #007BFF; color: white;" title="Volver (Alt + ←)">
                                ⬅ Atrás
                            </button>
                        
                        <!-- Print button -->
                        <form action="{{ route('pos.printInvoice') }}" method="post">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                            <button type="submit" class="btn mr-2" style="background-color: #007BFF; color: white;"><i class="las la-print"></i> Imprimir</button>
                        </form>

                        <button type="button" class="btn mr-2" style="background-color: #007BFF; color: white;" data-toggle="modal" data-target=".bd-example-modal-lg">Crear</button>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-white">
                                        <h3 class="modal-title text-center mx-auto">Factura de {{ $customer->name }}<br/>Monto Total ${{ Cart::total() }}</h3>
                                    </div>
                                    <form action="{{ route('pos.storeOrder') }}" method="post" id="invoice-form">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                    
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="payment_status">Metodo de pago: </label>
                                                    <select class="form-control @error('payment_status') is-invalid @enderror" name="payment_status" required>
                                                        <option selected="" disabled="">-- Seleccionar Pago --</option>
                                                        <option value="HandCash">Efectivo</option>
                                                        <option value="Cheque">Cheque</option>
                                                        <option value="Due">Pendiente</option>
                                                    </select>
                                                    @error('payment_status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="pay">Pagar ahora: </label>
                                                    <input type="text" class="form-control @error('pay') is-invalid @enderror" id="pay" name="pay" value="{{ old('pay') }}" required placeholder="Valor en pesos COP">
                                                    @error('pay')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn" style="background-color: #28a745; color: white;">Guardar</button>
                                            <button type="button" class="btn" style="background-color: #007BFF; color: white;" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </form>
                                    
                                    <script>
                                        document.getElementById('invoice-form').addEventListener('submit', function(event) {
                                            var paymentStatus = document.querySelector('[name="payment_status"]').value;
                                            var payAmount = document.querySelector('[name="pay"]').value;
                                    
                                            // Si el monto 'Pay Now' es vacío y el estado de pago no es "Due", mostramos un mensaje de alerta
                                            if (payAmount === '' && paymentStatus !== 'Due') {
                                                event.preventDefault();  // Prevenimos el envío del formulario
                                                alert('Please enter the payment amount or select Due payment status.');
                                            }
                                        });
                                    </script>
                                    
                                </div>
                            </div>
                        </div>
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
                                            <th scope="col">Dirección de facturación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ Carbon\Carbon::now()->format('M d, Y') }}</td>
                                            <td><span class="badge" style="background-color: #ffb300; color: white;">No pagado</span></td>
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
                                        <h6>Subtotal</h6>
                                        <p>${{ Cart::subtotal() }}</p>
                                    </div>
                                    <div>
                                        <h6>Iva (19%)</h6>
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
@endsection
