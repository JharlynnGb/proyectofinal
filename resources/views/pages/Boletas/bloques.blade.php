@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Cargar Boleta'])
    <div class="container-fluid py-4 align-items-center">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form role="form" action="{{ route('user-boletas') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="grados" class="form-control-label">Bloque</label>
                                        <select class="form-control form-control-sm" id="bloques" name="bloques">
                                            <option value="0">Todos</option>
                                            @foreach ($bloques as $bloques)
                                                <option value="{{ $bloques->id }}">{{ $bloques->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="grados" class="form-control-label">Grado</label>
                                        <select class="form-control form-control-sm" id="grados" name="grados">
                                            <option value="0">Todos</option>
                                            @foreach ($grados as $grado)
                                                <option value="{{ $grado->id }}">{{ $grado->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="secciones" class="form-control-label">Sección</label>
                                        <select class="form-control form-control-sm" id="secciones" name="secciones">
                                            <option value="0">Todas</option>
                                            @foreach ($secciones as $item)
                                                <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
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
        <form action="{{ route('registrar-boletas') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn form-control-sm bg-gradient-success">
                                    Guardar
                                </button>
                            </div>
                        </div>
                        <div id="alert">
                            @include('components.alert')
                        </div>
                        <div class="card">
                            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr style="position: sticky; top: 0; background-color: #fff; z-index: 2;">
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                DNI
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nombres y Apellidos
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Grado y Seccion
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Bimestre
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Boleta
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($estudiantes as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center px-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="selected_estudiantes[]" value="{{ $item->id }}">
                                                        </div>
                                                        <div class="my-auto text-center">
                                                            <h6 class="mb-0 ps-2 text-xs">{{ $item->dni }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->Nombres }}
                                                        {{ $item->Apellidos }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->Grado }}</p>
                                                </td>
                                                <td>
                                                    <select class="form-control-sm" name="idBimestre[]" required>
                                                        <option value="" disabled selected>Todas</option>
                                                        @foreach ($bimestres as $bimestre)
                                                            <option value="{{ $bimestre->id }}"
                                                                {{ old('idBimestre') == $bimestre->id ? 'selected' : '' }}>
                                                                {{ $bimestre->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control form-control-sm" lang="en" name="Boleta[]">
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
        </form>
    </div>
    
    {{-- @include('layouts.footers.auth.footer') --}}
@endsection
