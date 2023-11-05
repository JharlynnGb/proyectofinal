@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Estudiantes'])
    <div class="container-fluid py-6">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">Estudiantes</h6>
                            @if (Auth::user()->rol === 'Admin')
                                <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"> + Nuevo</button>
                                <!-- Agrega un margen a la izquierda del botón "Carga masiva" para separarlo -->
                                <div class="dropdown d-flex align-items-center" style="margin-left: 20px;">
                                    <button class="btn btn-info btn-sm ms-auto dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Carga Masiva
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Descargar Plantilla</a></li>
                                        <li><a class="dropdown-item" href="#">Cargar plantilla</a></li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if (Auth::user()->rol === 'Admin')
                        <div id="alert">
                            @include('components.alert')
                        </div>
                    @endif
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            DNI</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nombres</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Apellidos</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Grado y Seccion</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Bloque</th>

                                        <th
                                            class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">
                                            Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estudiante as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-0">
                                                    <div>
                                                        <img src="https://cdn-icons-png.flaticon.com/128/599/599305.png"
                                                            class="avatar avatar-sm rounded-circle me-2">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xs">{{ $item->dni }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->Nombres }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->Apellidos }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->Grado }}{{ $item->Seccion }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">por corregir</p>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex px-1 py-1 justify-content-center align-items-center">
                                                    @if (Auth::user()->rol === 'Admin')
                                                        <button type="button" class="btn btn-info btn-xs me-2"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editModalEstudiante{{ $item->id }}">
                                                            <i class="fas fa-edit"></i>
                                                            <button type="button" class="btn btn-danger btn-xs"
                                                                id="confirmDelete" data-id="{{ $item->id }}">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                    @endif
                                                    <button type="button" class="btn btn-success btn-xs"
                                                        data-bs-toggle="modal">
                                                        <i class="fas fa-info-circle"></i> <!-- Icono de info -->
                                                    </button>
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
        </div>
        {{-- @include('layouts.footers.auth.footer') --}}
    </div>
    @include('components.modals.modal-estudiante')
    @include('components.modals.modal-edit-estudiante')

    <script>
        $(document).ready(function() {
            $('#confirmDelete').on('click', function() {
                var registroId = $(this).data('id');
                var deleteUrl = "{{ route('estudiantes.destroy', ':id') }}".replace(':id', registroId);

                Swal.fire({
                    title: 'Advertencia de Eliminación',
                    text: '¿Está seguro que desea eliminar este registro? Esta acción eliminará al estudiante y sus registros asociados.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Se ha confirmado la eliminación, enviar la solicitud de eliminación al servidor
                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function() {
                                Swal.fire({
                                    title: 'Éxito',
                                    text: 'Estudiante y registros asociados eliminados con éxito',
                                    icon: 'success',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location
                                    .reload(); // Otra acción después de la eliminación
                                    }
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
