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
                    <h4 class="mb-3">Lista de sueldos anticipados</h4>
                    <p class="mb-0">Un panel de control salarial avanzado te permite recopilar y visualizar fácilmente datos salariales avanzados optimizados. <br>
                        La experiencia de pago anticipado garantiza la retención del salario anticipado.  </p>
                </div>
                <div>
                    <a href="{{ route('advance-salary.create') }}" class="btn add-list"
                                    style="color: white; border: 2px solid #007BFF; background-color: #007BFF; transition: background-color 0.3s;"><i
                            class="fas fa-plus mr-3"></i></i>Crear salario adelantado</a>
                    <a href="{{ route('advance-salary.index') }}" class="btn add-list"
                                    style="color: white; border: 2px solid #ff6f6f; background-color: #ff6f6f; transition: background-color 0.3s;">
                        <i class="fa-solid fa-trash mr-3"></i>Borrar búsqueda
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('advance-salary.index') }}" method="get">
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
                            <th>@sortablelink('employee.name', 'nombre')</th>
                            <th>@sortablelink('fecha')</th>
                            <th>@sortablelink('advance_salary', 'salario adelantado')</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @forelse ($advance_salaries as $advance_salary)
                        <tr>
                            <td>{{ (($advance_salaries->currentPage() * 10) - 10) + $loop->iteration }}</td>
                            <td>
                                <img class="avatar-60 rounded"
                                    src="{{ $advance_salary->employee->photo ? asset('storage/employees/'.$advance_salary->employee->photo) : asset('assets/images/user/1.png') }}">
                            </td>
                            <td>{{ $advance_salary->employee->name }}</td>
                            <td>{{ Carbon\Carbon::parse($advance_salary->date)->format('M/Y') }}</td>
                            <td>{{ $advance_salary->advance_salary ? '$'.$advance_salary->advance_salary : 'No Advance'
                                }}</td>
                            <td>
                                <form action="{{ route('advance-salary.destroy', $advance_salary->id) }}" method="POST"
                                    style="margin-bottom: 5px">
                                    @method('delete')
                                    @csrf
                                    <div class="d-flex align-items-center list-action">
                                        <a class="input-group-text text-white" style="background-color: #28a745;" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="Editar"
                                            href="{{ route('advance-salary.edit', $advance_salary->id) }}""><i class="
                                            ri-pencil-line mr-0"></i>
                                        </a>
                                        <button type="submit" class="input-group-text text-white" style="background-color: #ff6f6f;"
                                            onclick="return confirm('¿Está seguro que desea eliminar este registro?')"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Eliminar">
                                            <i class="ri-delete-bin-line mr-0"></i>
                                        </button>
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
            {{ $advance_salaries->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

@endsection