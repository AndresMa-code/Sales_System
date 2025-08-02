@extends('dashboard.body.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('success'))
            <div class="alert text-white bg-success" role="alert">
                <div class="iq-alert-text">{{ session('success') }}</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            @endif

            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Lista completa de pedidos</h4>
                </div>
                <div>
                    {{-- Fixed: Clear Search points to the correct route --}}
                    <a href="{{ route('order.completeOrders') }}" class="btn custom-button"
                        style="background-color: #ff6f6f; color: white; border: 2px solid #007BFF; transition: background-color 0.3s;">
                        <i class="fa-solid fa-trash mr-3"></i>Borrar búsqueda
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('order.completeOrders') }}" method="get">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="form-group row">
                        <label for="row" class="col-sm-3 align-self-center">Filas:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="row">
                                <option value="10" @if(request('row')=='10' ) selected @endif>10</option>
                                <option value="25" @if(request('row')=='25' ) selected @endif>25</option>
                                <option value="50" @if(request('row')=='50' ) selected @endif>50</option>
                                <option value="100" @if(request('row')=='100' ) selected @endif>100</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center" for="search">Buscar:</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" id="search" class="form-control" name="search"
                                    placeholder="Orden búsqueda" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text"
                                        style="background-color: #007BFF; color: white;">
                                        <i class="fa-solid fa-magnifying-glass font-size-20"></i> Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">

                {{-- Fixed: Using $orders instead of $products --}}
                @if($orders->isEmpty())
                <div class="alert text-white bg-danger" role="alert">
                    <div class="iq-alert-text">No se encontraron datos.</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                @else
                <table class="table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No.</th>
                            <th>N.º de factura</th>
                            <th>@sortablelink('customer.name', 'Nombre')</th>
                            <th>@sortablelink('order_date', 'Fecha del pedido')</th>
                            <th>@sortablelink('pay', 'Pagar')</th>
                            <th>Pago</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($orders as $order)
                        <tr>
                            {{-- Fixed: Correct pagination index based on perPage --}}
                            <td>{{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration }}</td>
                            <td>{{ $order->invoice_no }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>${{ $order->pay }}</td>
                            <td>
                                @if($order->payment_status == 'Cheque')
                                    Cheque
                                @elseif($order->payment_status == 'Due')
                                    Pendiente
                                @elseif($order->payment_status == 'HandCash')
                                    Efectivo
                                @else
                                    {{ $order->payment_status }}
                                @endif
                            </td>
                            <td>
                                <span class="badge" style="background-color: #28a745; color: white;">
                                    {{ $order->order_status == 'complete' ? 'completo' : $order->order_status }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="btn btn-info mr-2" data-toggle="tooltip" title="Detalles"
                                        href="{{ route('order.orderDetails', $order->id) }}"
                                        style="color: white; background-color: #1fb8cc; border: 2px solid #1fb8cc;">
                                        Detalles
                                    </a>
                                    <a class="btn btn-success mr-2" data-toggle="tooltip" title="Imprimir"
                                        href="{{ route('order.invoiceDownload', $order->id) }}"
                                        style="color: white; background-color: #007BFF; border: 2px solid #007BFF;">
                                        Imprimir
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>

            {{-- Pagination with query strings preserved --}}
            {{ $orders->appends(request()->input())->links() }}
        </div>
    </div>
</div>
@endsection