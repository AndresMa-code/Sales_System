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
                    <h4 class="mb-3">Lista de roles</h4>
                    <p class="mb-0">Un panel de control de roles le permite recopilar y visualizar fácilmente datos de roles optimizados. <br>
                        La experiencia del rol garantiza la retención del rol. </p>
                </div>
                <div>
                    <a href="{{ route('role.create') }}" class="btn add-list"
                                        style="color: white; border: 2px solid #007BFF; background-color: #007BFF; transition: background-color 0.3s;"><i
                            class="fa-solid fa-plus mr-3"></i>Agregar rol</a>
                </div>
            </div>
        </div>

        {{-- <div class="col-lg-12">
            <form action="{{ route('customers.index') }}" method="get">
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
                                    placeholder="Search customer" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-indigo">
                                        <i class="fa-solid fa-magnifying-glass font-size-20"></i> Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div> --}}

        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No.</th>
                            <th>Nombre del rol</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ (($roles->currentPage() * 10) - 10) + $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                    style="margin-bottom: 5px">
                                    @method('delete')
                                    @csrf
                                    <div class="d-flex align-items-center list-action">
                                        <a class="input-group-text text-white" style="background-color: #28a745;" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="Editar"
                                            href="{{ route('role.edit', $role->id) }}""><i class=" ri-pencil-line
                                            mr-0"></i>
                                        </a>
                                        <button type="submit" class="input-group-text text-white" style="background-color: #ff6f6f;"
                                            onclick="return confirm('¿Está seguro que desea eliminar este registro?')"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Eliminar"><i
                                                class="ri-delete-bin-line mr-0"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $roles->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

@endsection