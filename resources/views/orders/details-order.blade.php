@extends('dashboard.body.main')

@section('container')
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Detalles del pedido de información</h4>
                    </div>
                </div>

                <div class="card-body">
                    <!-- begin: Show Data -->
                    <div class="form-group row align-items-center">
                        <div class="col-md-12 text-center">
                            <div class="profile-img-edit d-inline-block">
                                <div class="crm-profile-img-edit">
                                    <img 
                                        class="crm-profile-pic rounded-circle avatar-100 border" 
                                        id="image-preview" 
                                        src="{{ $order->customer && $order->customer->photo ? asset('storage/customers/' . $order->customer->photo) : asset('storage/customers/default.png') }}" 
                                        alt="profile-pic"
                                        style="width: 120px; height: 120px; object-fit: cover;"
                                    >
                                </div>
                                <div class="mt-2">
                                    <span class="text-muted">Foto del cliente: </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4 class="mb-1">{{ $order->customer->name }}</h4>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="form-group col-md-12">
                            <label>Nombre del cliente</label>
                            <input type="text" class="form-control bg-white" value="{{ $order->customer->name }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Correo electrónico del cliente</label>
                            <input type="text" class="form-control bg-white" value="{{ $order->customer->email }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Teléfono del cliente</label>
                            <input type="text" class="form-control bg-white" value="{{ $order->customer->phone }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Fecha del pedido</label>
                            <input type="text" class="form-control bg-white" value="{{ $order->order_date }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Factura del pedido</label>
                            <input class="form-control bg-white" id="buying_date" value="{{ $order->invoice_no }}" readonly/>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Estado del pago</label>
                            <input class="form-control bg-white" id="expire_date" value="{{ $order->payment_status }}" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Monto pagado</label>
                            <input type="text" class="form-control bg-white" value="{{ $order->pay }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Monto adeudado</label>
                            <input type="text" class="form-control bg-white" value="{{ $order->due }}" readonly>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a 
                            class="btn btn-info" 
                            href="{{ route('order.completeOrders') }}" 
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Ver pedidos con pagos completos"
                        >
                            Pagos completos
                        </a>
                    </div>
                    
                    <!-- end: Show Data -->

                    @if ($order->order_status == 'pending')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center list-action">
                                    <form action="{{ route('order.updateStatus') }}" method="POST" style="margin-bottom: 5px">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <button type="submit" class="btn" style="background-color: #28a745; color: white;" data-toggle="tooltip" data-placement="top" title="Mark as completed" data-original-title="Complete">Pedido completo</button>
                                        <a class="btn" style="background-color: #ffb300; color: white;" data-toggle="tooltip" data-placement="top" title="Go back to pending orders" data-original-title="Cancel" href="{{ route('order.pendingOrders') }}">Cancelar</a>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>


        <!-- end: Show Data -->
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Nombre del producto</th>
                            <th>Código del producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total(+iva)</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($orderDetails as $item)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>
                                <img
                                    class="rounded"
                                    style="width: 80px; height: 80px; object-fit: cover;"
                                    src="{{ $item->product && $item->product->product_image ? asset('storage/products/' . $item->product->product_image) : asset('storage/products/default.webp') }}"
                                    alt="product"
                                >
                            </td>
                            <td>{{ $item->product->product_name }}</td>
                            <td>{{ $item->product->product_code }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ $item->unitcost }}</td>
                            <td>${{ $item->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>

@include('components.preview-img-form')
@endsection
