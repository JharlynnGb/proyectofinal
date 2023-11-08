@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Docentes'])
    <div class="container-fluid py-2 align-items-center">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form role="form" action="{{route('docentes')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="busqueda" class="form-control-label">Buscar</label>
                                        <input type="text" class="form-control form-control-sm" id="busqueda"
                                            name="busqueda" placeholder="Buscar...">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="busqueda" class="form-control-label"
                                            style="color: white;">Buscar</label>
                                        <button type="submit"
                                            class="form-control form-control-sm btn btn-primary btn-sm">BUSCAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-0">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
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
                                            Correo</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Telefono</th>

                                        <th
                                            class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">
                                            Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docente as $item)
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
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->Correo }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->Telefono }}</p>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex px-1 py-1 justify-content-center align-items-center">
                                                    @if (Auth::user()->rol === 'Admin')
                                                        <button type="button" class="btn btn-info btn-xs me-2"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editModalDocente{{ $item->id }}">
                                                            <i class="fas fa-edit"></i> <!-- Icono de edición -->
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-danger btn-xs me-2 confim-delete-docente"
                                                            data-id="{{ $item->id }}">
                                                            <i class="fas fa-trash-alt"></i> <!-- Icono de eliminación -->
                                                        </button>
                                                    @endif
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
    @include('components.modals.modal-docente')
    @include('components.modals.modal-edit-docente')

    <script>
        $(document).ready(function() {
            $('.confim-delete-docente').on('click', function() {
                var registroId = $(this).data('id');
                var deleteUrl = "{{ route('docentes.destroy', ':id') }}".replace(':id', registroId);

                Swal.fire({
                    title: '¡Advertencia!',
                    text: '¿Está seguro que desea eliminar este registro?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#FA2F13',
                    cancelButtonColor: '#29BEFF',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    customClass: {
                        title: 'my-title-class',
                        content: 'my-content-class',
                        confirmButton: 'btn btn-danger',
                        cancelButton: 'btn btn-info',
                    },
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
                                    title: '¡Éxito!',
                                    text: 'Docente y registros asociados eliminados con éxito',
                                    icon: 'success',
                                    customClass: {
                                        title: 'my-success-title-class',
                                        content: 'my-success-content-class',
                                    },
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
