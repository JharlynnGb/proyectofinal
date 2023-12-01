@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Mi Perfil'])
    <div class="container-fluid py-8">
        <div class="card shadow-lg mx-4 card-profile">
            <div class="card-body p-2">
                <div class="row gx-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="https://cdn-icons-png.flaticon.com/128/599/599305.png" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <div class="mb-1">
                                <h5>
                                    {{ auth()->user()->username ?? 'Username' }}
                                </h5>
                            </div>
                            <p class="font-weight-bold text-sm text-success">
                                {{ auth()->user()->rol ?? 'rol' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="alert">
            @include('components.alert')
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                @if ($estudiante)
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    {{-- <p class="mb-0">Editar perfil</p>
                                    <button type="submit" class="btn btn-success btn-sm ms-auto">GUARDAR</button> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-uppercase text-sm">Informacion de Personal</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nombres</label>
                                            <input class="form-control" type="text" name=""
                                                value="{{ $estudiante->Nombres }}"readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Apellidos</label>
                                            <input class="form-control" type="text" name=""
                                                value="{{ $estudiante->Apellidos }}"readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">E-mail</label>
                                            <input class="form-control" type="email" name="firstname"
                                                value="{{ $estudiante->Correo }}"readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Telefono</label>
                                            <input class="form-control" type="text" name="lastname"
                                                value="{{ $estudiante->Telefono }}"readonly>
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Informacion de Direccion</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">DIRECCION</label>
                                            <input class="form-control" type="text" name="address"
                                                value="{{ $estudiante->Direccion }}"readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($docente)
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    {{-- <p class="mb-0">Editar perfil</p>
                                    <button type="submit" class="btn btn-success btn-sm ms-auto">GUARDAR</button> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-uppercase text-sm">Informacion de Personal</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nombres</label>
                                            <input class="form-control" type="text" name=""
                                                value="{{ $docente->Nombres }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Apellidos</label>
                                            <input class="form-control" type="text" name=""
                                                value="{{ $docente->Apellidos }}"readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">E-mail</label>
                                            <input class="form-control" type="email" name="firstname"
                                                value="{{ $docente->Correo }}"readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Telefono</label>
                                            <input class="form-control" type="text" name="lastname"
                                                value="{{ $docente->Telefono }}"readonly>
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Informacion de Direccion</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">DIRECCION</label>
                                            <input class="form-control" type="text" name="address"
                                                value="{{ $docente->Direccion }}"readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="text-uppercase text-sm">Editar Informacion de Usuario</p>
                            </div>
                        </div>
                        <form role="form" action="{{ route('profile.update', auth()->user()->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="username" class="form-control-label">Username</label>
                                            <input class="form-control" type="text" name="username"
                                                value="{{ auth()->user()->username }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="form-control-label">E-mail</label>
                                            <input class="form-control" type="email" id="email" name="email"
                                                value="{{ auth()->user()->correo }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="contrasena" class="form-control-label">Contraseña</label>
                                            <input class="form-control" type="password" id="old_password"
                                                name="old_password">
                                            @error('old_password')
                                                <p class="text-danger text-xs pt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nueva-contrasena" class="form-control-label">Nueva
                                                Contraseña</label>
                                            <input class="form-control" type="password" id="new_password"
                                                name="new_password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn form-control btn-success btn-sm">GUARDAR</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
