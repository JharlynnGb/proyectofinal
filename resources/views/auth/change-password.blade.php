@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h5 class="font-weight-bolder">Cambiar contraseña</h5>
                                    <p class="text-sm mt-2 mb-0">Ingrese su Email y su nueva contraseña</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('change.perform') }}">
                                        @csrf

                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="Email"
                                                value="{{ old('email') }}" aria-label="Email">
                                            @error('email')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input id="passwordInput" type="password" name="password" class="form-control"
                                                placeholder="Password" aria-label="Password">
                                            {{--<i class="fas fa-eye " id="togglePassword"></i>--}}
                                            @error('password')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="confirm-password" class="form-control"
                                                placeholder="Password" aria-label="Password">
                                            @error('confirm-password')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Enviar enlace de
                                                reinicio</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="alert">
                                    @include('components.alert')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
