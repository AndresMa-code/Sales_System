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
                    <h4 class="mb-3">Lista de categorías</h4>
                    <p class="mb-0">Un panel de categorías le permite recopilar y visualizar fácilmente datos de categorías para optimizar <br>
                        la experiencia de la categoría y garantizar su retención. </p>
                </div>
                <div>
                    <a href="{{ route('categories.create') }}" class="btn add-list" style="background-color: #007BFF; color: white;">
                     <i class="fas fa-plus mr-3"></i>Crear categoría</a>  
                    <a href="{{ route('categories.index') }}" class="btn add-list" style="background-color: #ff6f6f; color: white;">
                  <i class="fa-solid fa-trash mr-3"></i>Borrar búsqueda</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('categories.index') }}" method="get">
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
                                    placeholder="Buscar categoría" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn" style="background-color: #007BFF; color: white;">
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
                            <th>@sortablelink('nombre')</th>
                            <th>@sortablelink('identificador')</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ (($categories->currentPage() * 10) - 10) + $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-2" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Editar"
                                        href="{{ route('categories.edit', $category->slug) }}"style="background-color: #28a745; color: white;"><i class="
                                        ri-pencil-line mr-0"></i>
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->slug) }}" method="POST"
                                        style="margin-bottom: 5px">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge mr-2" style="background-color: #ff6f6f; color: white;"
                                            onclick="return confirm('¿Está seguro que desea eliminar este registro?')"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Eliminar"><i
                                                class="ri-delete-bin-line mr-0"></i></button>
                                    </form>
                                </div>
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
            {{ $categories->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

@endsection