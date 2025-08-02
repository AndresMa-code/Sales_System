@extends('dashboard.body.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('success'))
                <div class="alert alert-success text-white" role="alert">
                    <div class="iq-alert-text">{{ session('success') }}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
            @endif
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <h4 class="mb-3">Lista de copias de seguridad de la base de datos</h4>

                <!-- Form to execute the backup command -->
                <form action="{{ route('backup.create') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn" style="background-color: #1fb8cc; color: white;">
                        <i class="fa-solid fa-cloud-upload-alt mr-2"></i> Copia de seguridad ahora
                    </button>
                </form>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No.</th>
                            <th>Nombre del archivo</th>
                            <th>Tamaño del archivo</th>
                            <th>Ruta</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($files as $file)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $file->getFileName() }}</td>
                                <td>{{ $file->getSize() }} KB</td>
                                <td>{{ $file->getPath() }}</td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="btn mr-2" style="background-color: #ffb300; color: white;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Descargar"
                                            href="{{ route('backup.download', $file->getFileName()) }}"><i class="fa-solid fa-download mr-0"></i>
                                            <i class="fa-solid fa-download mr-0"></i> Descargar
                                        </a>
                                        <a class="btn mr-2" style="background-color: #ff6f6f; color: white;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar"
                                            href="{{ route('backup.delete', $file->getFileName()) }}"><i class="fa-solid fa-trash mr-0"></i>
                                            <i class="fa-solid fa-trash mr-0"></i> Eliminar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
