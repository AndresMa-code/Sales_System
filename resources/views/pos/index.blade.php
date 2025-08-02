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
            <div>
                <h4 class="mb-3">Sistema de punto de venta. Sales System POS</h4>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-3">
            <table class="table">
                <thead>
                    <tr class="ligth">
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">SubTotal</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productItem as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td style="min-width: 140px;">
                            <form action="{{ route('pos.updateCart', $item->rowId) }}" method="POST">
                                @csrf
                                <div class="input-group flex-nowrap" style="max-width: 180px;">
                                    <input type="number" class="form-control text-center" name="qty" required
                                        value="{{ old('qty', $item->qty) }}" min="1" style="width: 70px;">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn"
                                            style="background-color: #1fb8cc; color: white; border: none;"
                                            data-toggle="tooltip" data-placement="top" title="Submit"
                                            data-original-title="Enviar">
                                            <i class="fas fa-check"></i> Entregar
                                        </button>
                                    </div>
                                </div>
        </div>
        </form>
        </td>
        <td>${{ $item->price }}</td>
        <td>${{ $item->subtotal }}</td>
        <td>
            <a href="{{ route('pos.deleteCart', $item->rowId) }}" class="btn"
                style="background-color: #ff6f6f; color: white; border: 2px solid #4B0082; transition: background-color 0.3s;"
                data-toggle="tooltip" data-placement="top" title="Delete article" data-original-title="Delete">
                <i class="fa-solid fa-trash mr-0"></i> Limpiar
            </a>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>

        <div class="container row text-center">
            <div class="form-group col-sm-6">
                <p class="h4" style="background-color: white; color: black;">Cantidad seleccionada: {{ Cart::count() }}</p>
            </div>
            <div class="form-group col-sm-6">
                <p class="h4" style="background-color: white; color: black;">Subtotal de la compra:${{ Cart::subtotal() }}</p>
            </div>
            <div class="form-group col-sm-6">
                <p class="h4" style="background-color: white; color: black;">Iva:${{ Cart::tax() }}</p>
            </div>
            <div class="form-group col-sm-6">
                <p class="h4" style="background-color: white; color: black;">Compras totales:${{ Cart::total() }}</p>
            </div>
        </div>

        <form action="{{ route('pos.createInvoice') }}" method="POST">
            @csrf
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="input-group">
                        <select class="form-control" id="customer_id" name="customer_id">
                            <option selected="" disabled="">-- Seleccionar cliente --</option>
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('customer_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-12 mt-4">
                    <div class="d-flex flex-wrap align-items-center justify-content-center">
                        <a href="{{ route('customers.create') }}" class="btn add-list mx-1"
                            style="background-color: #007BFF; color: white;">Agregar cliente</a>
                        <button type="submit" class="btn add-list mx-1"
                            style="background-color: #28a745; color: white;">Crear factura</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="card card-block card-stretch card-height">
            <div class="card-body">
                <form action="#" method="get">
                    <div class="form-group row mb-3">
                        <label for="row" class="align-self-center mx-2">Fila:</label>
                        <div>
                            <select class="form-control" name="row">
                                <option value="10" @if(request('row')=='10' )selected="selected" @endif>10</option>
                                <option value="25" @if(request('row')=='25' )selected="selected" @endif>25</option>
                                <option value="50" @if(request('row')=='50' )selected="selected" @endif>50</option>
                                <option value="100" @if(request('row')=='100' )selected="selected" @endif>100</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="control-label col-sm-3 align-self-center" for="search">Buscar:</label>
                        <div class="input-group col-sm-8">
                            <input type="text" id="search" class="form-control" name="search"
                                placeholder="Buscar producto" value="{{ request('search') }}">
                        </div>
                    </div>

                    <div class="d-flex flex-wrap align-items-center justify-content-between mt-2">
                        <div>
                            <button type="submit" class="btn"
                                style="background-color: #007BFF; color: white; border: 2px solid #007BFF; transition: background-color 0.3s;">
                                <i class="fa-solid fa-search mr-1"></i>Buscar
                            </button>
                            <a href="{{ route('pos.index') }}" class="btn"
                                style="background-color: #ff6f6f; color: white; border: 2px solid #ff6f6f; transition: background-color 0.3s;">
                                <i class="fa-solid fa-trash mr-1"></i>Borrar búsqueda
                            </a>
                        </div>
                        <a href="{{ route('products.index') }}" class="btn"
                            style="background-color: #1fb8cc; color: white;">
                            Lista de productos
                        </a>
                    </div>
                </form>


                <div class="table-responsive rounded mb-3 border-none">
                    <table class="table mb-0">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>No.</th>
                                <th>Foto</th>
                                <th>@sortablelink('product_name', 'Nombre')</th>
                                <th>@sortablelink('selling_price', 'Precio')</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ (($products->currentPage() * 10) - 10) + $loop->iteration }}</td>
                                <td>
                                    <img class="avatar-60 rounded"
                                        src="{{ $product->product_image ? asset('storage/products/'.$product->product_image) : asset('assets/images/product/default.webp') }}">
                                </td>
                                <td>{{ $product->product_name }}</td>
                                <td>${{ $product->selling_price }}</td>
                                <td>
                                    <form action="{{ route('pos.addCart') }}" method="POST" style="margin-bottom: 5px">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->product_name }}">
                                        <input type="hidden" name="price" value="{{ $product->selling_price }}">

                                        <button type="submit" class="btn border-none"
                                            style="background-color: #ffb300; color: white;" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Agregar al carrito">
                                            <i class="far fa-plus mr-0"></i> Agregar
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @empty
                            <div class="alert text-white bg-danger" role="alert">
                                <div class="iq-alert-text">Datos no encontrados.</div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection