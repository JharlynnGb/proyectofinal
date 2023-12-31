@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Estudiantes'])
    <div class="container-fluid py-2 align-items-center">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form role="form" action="{{ route('estudiantes') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="grados" class="form-control-label">Bloque</label>
                                        <select class="form-control form-control-sm" id="bloques" name="bloques">
                                            <option value="0">Todos</option>
                                            @foreach ($bloques as $item)
                                                <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="grados" class="form-control-label">Grado</label>
                                        <select class="form-control form-control-sm" id="grados" name="grados">
                                            <option value="" disabled selected>Todos</option>
                                            @foreach ($grados as $item)
                                                <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="secciones" class="form-control-label">Sección</label>
                                        <select class="form-control form-control-sm" id="secciones" name="secciones">
                                            <option  value="" disabled selected>Todas</option>
                                            @foreach ($secciones as $item)
                                                <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
                            @endif
                        </div>
                    </div>
                    @if (Auth::user()->rol === 'Admin')
                        <div id="alert">
                            @include('components.alert')
                        </div>
                    @endif
                    <div class="card">
                        <div class="table-responsive" style="max-height: 400px; overflow-y: Scroll;">
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
                                    @foreach ($estudiantes as $item)
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
                                                    {{ $item->grados->descripcion }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->bloques->descripcion }}
                                                </p>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex px-1 py-1 justify-content-center align-items-center">
                                                    @if (Auth::user()->rol === 'Admin')
                                                        <button type="button" class="btn btn-info btn-xs me-2"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editModalEstudiante{{ $item->id }}">
                                                            <i class="fas fa-edit"></i>
                                                            <button type="button"
                                                                class="btn btn-danger btn-xs confirm-delete me-2"
                                                                data-id="{{ $item->id }}">
                                                                <i class="fas fa-trash-alt"></i>
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
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
        {{-- @include('layouts.footers.auth.footer') --}}
    </div>
    @include('components.modals.modal-estudiante')
    <script>
        $(document).ready(function() {
            $('.confirm-delete').on('click', function() {
                var registroId = $(this).data('id');
                var deleteUrl = "{{ route('estudiantes.destroy', ':id') }}".replace(':id', registroId);

                Swal.fire({
                    title: 'Advertencia de Eliminación',
                    text: '¿Está seguro que desea eliminar este registro? Esta acción eliminará al estudiante y sus registros asociados.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#FA2F13',
                    cancelButtonColor: '#29BEFF',
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
