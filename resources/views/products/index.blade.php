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
            @if (session()->has('error'))
            <div class="alert text-white bg-danger" role="alert">
                <div class="iq-alert-text">{{ session('success') }}</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            @endif
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Lista de productos</h4>
                    <p class="mb-0">Un panel de control de productos le permite recopilar y visualizar fácilmente datos de productos,
                        <br>
                        lo que ayuda a optimizar la experiencia del producto y a garantizar su retención a largo plazo.
                    </p>
                </div>
                <div>
                    <a href="{{ route('products.importView') }}" class="btn add-list"
                        style="color: white; border: 2px solid #ffb300; background-color: #ffb300;">Importar</a>
                    <a href="{{ route('products.exportData') }}" class="btn add-list"
                        style="color: white; border: 2px solid #E49B0F; background-color: #E49B0F;">Exportar</a>
                    <a href="{{ route('products.create') }}" class="btn add-list"
                        style="color: white; border: 2px solid #007BFF; background-color: #007BFF;">Agregar producto</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('products.index') }}" method="get">
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

                    <div class="form-group row align-items-center">
                        <label class="control-label col-sm-3" for="search">Buscar:</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" id="search" class="form-control" name="search"
                                    placeholder="Buscar producto" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text text-white" style="background-color: #007BFF;">
                                        <i class="fa-solid fa-magnifying-glass"></i> Buscar
                                    </button>
                                    <a href="{{ route('products.index') }}" class="input-group-text text-white" style="background-color: #ff6f6f;">
                                        <i class="fa-solid fa-trash"></i> Borrar búsqueda
                                    </a>
                                </div>
                            </div>
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
                            <th>Foto</th>
                            <th>@sortablelink('product_name', 'nombre')</th>
                            <th>@sortablelink('category.name', 'categoría')</th>
                            <th>@sortablelink('supplier.name', 'proveedor')</th>
                            <th>@sortablelink('selling_price', 'precio')</th>
                            <th>Estado</th>
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
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->supplier->name }}</td>
                            <td>${{ $product->selling_price }}</td>
                            <td>
                                @if ($product->expire_date > Carbon\Carbon::now()->format('Y-m-d'))
                                <span class="badge rounded-pill"
                                    style="background-color: #1fb8cc; color: white;">Correcto</span>
                                @else
                                <span class="badge rounded-pill"
                                    style="background-color: #ff6f6f; color: white;">Incorrecto</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="margin-bottom: 5px">
                                    @method('delete')
                                    @csrf
                                    <div class="d-flex align-items-center list-action">
                                        <a class="input-group-text text-white" style="background-color: #007BFF;" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="Ver"
                                            href="{{ route('products.show', $product->id) }}"><i
                                                class="ri-eye-line mr-0"></i>
                                        </a>
                                        <a class="input-group-text text-white" style="background-color: #28a745;" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="Editar"
                                            href="{{ route('products.edit', $product->id) }}""><i class=" ri-pencil-line
                                            mr-0"></i>
                                        </a>
                                        <button type="submit" class="input-group-text text-white" style="background-color: #ff6f6f;"
                                            onclick="return confirm('¿Está seguro que desea eliminar este registro?')"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Borrar"><i
                                                class="ri-delete-bin-line mr-0"></i></button>
                                    </div>
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
    <!-- Page end  -->
</div>

@endsection