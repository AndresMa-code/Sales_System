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
                    <h4 class="mb-3">Lista de empleados</h4>
                    <p class="mb-0">Un panel de control de empleados permite recopilar y visualizar fácilmente los datos de los empleados para optimizar la experiencia del empleado. <br>
                        La experiencia del empleado es crucial para garantizar su retención. </p>
                </div>
                <div>
                    <a href="{{ route('employees.create') }}" class="btn add-list"style="color: white; border: 2px solid #007BFF; background-color: #007BFF;">Agregar empleado</a>
                    <a href="{{ route('employees.index') }}" class="btn add-list"style="color: white; border: 2px solid #ff6f6f; background-color: #ff6f6f;">Borrar búsqueda</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('employees.index') }}" method="get">
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
                                    placeholder="Buscar empleado" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn add-list"
                                        style="color: white; border: 2px solid #007BFF; background-color: #007BFF; transition: background-color 0.3s;">
                                        <i class="fa-solid fa-search mr-3"></i>Buscar
                                    </button>
                                </div>
                            </div>
                            {{-- <input id="search" type="text" class="form-control" name="search"
                                placeholder="Search employee"> --}}
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
                            <th>@sortablelink('salario')</th>
                            <th>@sortablelink('ciudad')</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @forelse ($employees as $employee)
                        <tr>
                            <td>{{ (($employees->currentPage() * 10) - 10) + $loop->iteration }}</td>
                            <td>
                                <img class="avatar-60 rounded"
                                    src="{{ $employee->photo ? asset('storage/employees/'.$employee->photo) : asset('assets/images/user/1.png') }}">
                            </td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>${{ $employee->salary }}</td>
                            <td>{{ $employee->city }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action" style="gap: 5px;">
                                    <a class="btn btn-sm text-white d-flex align-items-center justify-content-center"
                                        style="background-color: #007BFF; width: 36px; height: 36px; padding: 0;"
                                        data-toggle="tooltip" data-placement="top" title="Ver"
                                        href="{{ route('employees.show', $employee->id) }}">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <a class="btn btn-sm text-white d-flex align-items-center justify-content-center"
                                        style="background-color: #28a745; width: 36px; height: 36px; padding: 0;"
                                        data-toggle="tooltip" data-placement="top" title="Editar"
                                        href="{{ route('employees.edit', $employee->id) }}">
                                        <i class="ri-pencil-line"></i>
                                    </a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-sm text-white d-flex align-items-center justify-content-center"
                                            style="background-color: #ff6f6f; width: 36px; height: 36px; padding: 0;"
                                            onclick="return confirm('¿Está seguro que desea eliminar este registro?')"
                                            data-toggle="tooltip" data-placement="top" title="Eliminar">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
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
            {{ $employees->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

@endsection