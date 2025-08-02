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
                    <h4 class="mb-3">Lista de órdenes pendientes con deuda</h4>
                </div>
                <div>
                    <a href="{{ route('order.pendingDue') }}" class="btn custom-button"
                    style="background-color: #ff6f6f; color: white; border: 2px solid #ff6f6f; transition: background-color 0.3s;">
                    <i class="fa-solid fa-trash mr-3"></i>Borrar búsqueda
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('order.pendingDue') }}" method="get">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="form-group row">
                        <label for="row" class="col-sm-3 align-self-center">Fila:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="row">
                                <option value="10" @if(request('row')=='10' )selected="selected" @endif>10</option>
                                <option value="25" @if(request('row')=='25' )selected="selected" @endif>25</option>
                                <option value="50" @if(request('row')=='50' )selected="selected" @endif>50</option>
                                <option value="100" @if(request('row')=='100' )selected="selected" @endif>100</option>
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
                                    <button type="submit" class="input-group-text" style="background-color: #007BFF; color: white;">
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
                <table class="table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No.</th>
                            <th>N.º de factura</th>
                            <th>@sortablelink('customer.name', 'nombre')</th>
                            <th>@sortablelink('order_date', 'fecha del pedido')</th>
                            <th>Pago</th>
                            <th>@sortablelink('Abonado')</th>
                            <th>@sortablelink('pendiente')</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @forelse ($orders as $order)
                        <tr>
                            <td>{{ (($orders->currentPage() * 10) - 10) + $loop->iteration }}</td>
                            <td>{{ $order->invoice_no }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ Carbon\Carbon::parse($order->order_date)->format('Y m, d') }}</td>
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
                                <span class="btn text-white"
                                    style="background-color: #ffb300; border: 2px solid #ffb300;">
                                    ${{ number_format($order->pay, 2) }}
                                </span>
                            </td>
                            <td>
                                <span class="btn text-white"
                                    style="background-color: #ff6f6f; border: 2px solid #ff6f6f;">
                                    ${{ number_format($order->due, 2) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="btn btn-info mr-2" data-toggle="tooltip" data-placement="top"
                                        title="Details" href="{{ route('order.orderDetails', $order->id) }}"
                                        style="color: white; background-color: #1fb8cc; border: 2px solid #1fb8cc;">
                                        Detalles
                                    </a>
                                    <button type="button" class="btn mr-2" data-toggle="modal"
                                        data-target=".bd-example-modal-lg" id="{{ $order->id }}"
                                        onclick="payDue(this.id)"
                                        style="background-color: #E49B0F; border: 2px solid #E49B0F; color: white;">
                                        Pago pendiente
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                <div class="alert text-white bg-danger text-center mb-0" role="alert">
                                    <div class="iq-alert-text">No se encontraron datos.</div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $orders->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('order.updateDue') }}" method="post">
                @csrf
                <input type="hidden" name="order_id" id="order_id">
                <div class="modal-body">
                    <h3 class="modal-title text-center mx-auto">Pagar deuda pendiente</h3>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="due">Pagar ahora: </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control bg-white @error('due') is-invalid @enderror" id="due"
                                    name="due">
                                @error('due')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="input-group-text" style="background-color: #ffb300; color: white;" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="input-group-text" style="background-color: #28a745; color: white;">Pagar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function payDue(id){
        $.ajax({
            type: 'GET',
            url : '/order/due/' + id,
            dataType: 'json',
            success: function(data) {
                $('#due').val(data.due);
                $('#order_id').val(data.id);
            }
        });
    }
</script>

@endsection