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
                    <h4 class="mb-3">Lista de usuarios</h4>
                </div>
                <div>
                    <a href="{{ route('users.create') }}" class="btn add-list"
                                    style="color: white; border: 2px solid #007BFF; background-color: #007BFF; transition: background-color 0.3s;"><i
                            class="fa-solid fa-plus mr-3"></i>Crear usuario</a>
                    <a href="{{ route('users.index') }}" class="btn add-list"
                                    style="color: white; border: 2px solid #ff6f6f; background-color: #ff6f6f; transition: background-color 0.3s;">
                        <i class="fa-solid fa-trash mr-3"></i>Borrar búsqueda
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('users.index') }}" method="get">
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
                                    placeholder="Buscar usuario" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn add-list"
                                    style="color: white; border: 2px solid #007BFF; background-color: #007BFF; transition: background-color 0.3s;">
                                    <i class="fa-solid fa-search mr-3"></i>Buscar
                                    </button>
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
                            <th>@sortablelink('nombre de usuario')</th>
                            <th>@sortablelink('correo electrónico')</th>
                            <th>Rol</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @forelse ($users as $item)
                        <tr>
                            <td>{{ (($users->currentPage() * 10) - 10) + $loop->iteration }}</td>
                            <td>
                                <img class="avatar-60 rounded"
                                    src="{{ $item->photo ? asset('storage/profile/'.$item->photo) : asset('assets/images/user/1.png') }}">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @foreach ($item->roles as $role)
                                <span class="badge" style="background-color: #ffb300;">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $item->username) }}" method="POST"
                                    style="margin-bottom: 5px">
                                    @method('delete')
                                    @csrf
                                    <div class="d-flex align-items-center list-action">
                                        {{-- <a class="btn btn-info mr-2" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="View"
                                            href="{{ route('users.show', $item->username) }}"><i
                                                class="ri-eye-line mr-0"></i>
                                        </a> --}}
                                        <a class="input-group-text text-white" style="background-color: #28a745;" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="Editar"
                                            href="{{ route('users.edit', $item->username) }}"><i
                                                class="ri-pencil-line mr-0"></i>
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
            {{ $users->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

@endsection