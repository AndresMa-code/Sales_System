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
                    <h4 class="mb-3">Lista de asistencia</h4>
                    <p class="mb-0">Ver y administrar los registros de asistencia de los empleados.</p>
                </div>
                <div>
                    <a href="{{ route('attendence.create') }}" class="btn add-list"style="color: white; border: 2px solid #007BFF; background-color: #007BFF;">Crear asistencia
                    </a>
                    <a href="{{ route('attendence.index') }}" class="btn add-list"style="color: white; border: 2px solid #ff6f6f; background-color: #ff6f6f;">Borrar búsqueda</a>
                </div>
            </div>

            <!-- Search and Filter -->
            <form action="{{ route('attendence.index') }}" method="get">
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
                        <label for="search" class="col-sm-3 align-self-center">Buscar:</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" name="search" id="search" class="form-control"
                                    placeholder="Por Nro. o Fecha"
                                    value="{{ old('search', request('search')) }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn add-list"
                                        style="color: white; border: 2px solid #007BFF; background-color: #007BFF; transition: background-color 0.3s;">
                                        <i class="fa-solid fa-magnifying-glass mr-1"></i>Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

        <!-- Attendance Table -->
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No.</th>
                            <th>@sortablelink('fecha')</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @forelse ($attendences as $attendence)
                        <tr>
                            <td>{{ (($attendences->currentPage() - 1) * $attendences->perPage()) + $loop->iteration }}
                            </td>
                            <td>{{ $attendence->date }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a href="{{ route('attendence.edit', $attendence->date) }}"
                                        class="btn mr-2" style="background-color: #28a745; color: white;" title="Editar">
                                        <i class="ri-pencil-line"></i>
                                    </a>

                                    <form action="{{ route('attendence.destroy', $attendence->date) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this attendance?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="background-color: #ff6f6f; color: white;" title="Eliminar">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">
                                <div class="alert text-white bg-danger" role="alert">
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
            {{ $attendences->links() }}
        </div>
    </div>
</div>
@endsection