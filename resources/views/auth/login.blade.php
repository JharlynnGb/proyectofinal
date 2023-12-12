@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0"
        style="background-image: url(https://imgs.deperu.com/colegios/ie_88021_alfonso_ugarte_nuevo_chimbote.jpg)">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row justify-content-center ">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-6 mx-auto ">
                            <div class="card card-plain bg-white">
                                <div class="card-header text-center pt-4">
                                    <h5>Iniciar Sesion</h5>
                                    <p class="mb-1 text-sm mx-auto">
                                        Ingresa con tu Email y Contraseña</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('login.perform') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="email" name="correo" class="form-control"
                                                value="{{ old('correo') }}" id="correo" placeholder="Correo Electronico">
                                            @error('correo')
                                                <p class="text-danger text-xs pt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="contraseña">
                                            @error('password')
                                                <p class="text-danger text-xs pt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Recordar</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn bg-gradient-dark w-100 my-4 mb-0">Ingresar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
