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
                    <h4 class="mb-3">Lista de proveedores</h4>
                    <p class="mb-0">Un panel de control de proveedores le permite recopilar y visualizar fácilmente sus datos para optimizar <br>
                        su experiencia y garantizar su retención. </p>
                </div>
                <div>
                    <a href="{{ route('suppliers.create') }}" class="btn add-list"style="color: white; border: 2px solid #007BFF; background-color: #007BFF;">Agregar proveedor</a>
                    <a href="{{ route('suppliers.index') }}" class="btn add-list"style="color: white; border: 2px solid #ff6f6f; background-color: #ff6f6f;">Borrar búsqueda
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('suppliers.index') }}" method="get">
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
                                    placeholder="Buscar proveedor" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn add-list"
                                    style="color: white; border: 2px solid #007BFF; background-color: #007BFF; transition: background-color 0.3s;">
                                    <i class="fa-solid fa-search mr-3"></i> Buscar
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
                            <th>Foto</th>
                            <th>@sortablelink('nombre')</th>
                            <th>@sortablelink('correo electrónico')</th>
                            <th>@sortablelink('teléfono')</th>
                            <th>@sortablelink('nombre de la tienda')</th>
                            <th>@sortablelink('tipo')</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ (($suppliers->currentPage() * 10) - 10) + $loop->iteration }}</td>
                            <td>
                                <img class="avatar-60 rounded"
                                    src="{{ $supplier->photo ? asset('storage/suppliers/'.$supplier->photo) : asset('assets/images/user/1.png') }}">
                            </td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td>{{ $supplier->shopname }}</td>
                            <td>{{ $supplier->type }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action gap-1">
                                    <a class="input-group-text text-white d-flex align-items-center justify-content-center mx-1" style="background-color: #007BFF;" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Ver"
                                        href="{{ route('suppliers.show', $supplier->id) }}"><i
                                            class="ri-eye-line mr-0"></i>
                                    </a>
                                    <a class="input-group-text text-white d-flex align-items-center justify-content-center mx-1" style="background-color: #28a745;" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Editar"
                                        href="{{ route('suppliers.edit', $supplier->id) }}"><i class="ri-pencil-line mr-0"></i>
                                    </a>
                                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST"
                                        style="margin-bottom: 0; display:inline;">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="input-group-text text-white d-flex align-items-center justify-content-center mx-1" style="background-color: #ff6f6f;"
                                            onclick="return confirm('¿Está seguro que desea eliminar este registro?')"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Delete"><i
                                                class="ri-delete-bin-line mr-0"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $suppliers->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

@endsection