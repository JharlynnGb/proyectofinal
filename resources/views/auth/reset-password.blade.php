@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0"
        style="background-image: url(https://png.pngtree.com/background/20230401/original/pngtree-school-classroom-desk-background-picture-image_2252872.jpg)">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                            <div class="card card-plain bg-white">
                                <div class="card-header pb-0 text-start">
                                    <h5 class="font-weight-bolder">Restablecer su contraseña</h5>
                                    <p class="text-sm mt-2 mb-0">Introduce tu correo electrónico y por favor espera unos
                                        segundos.</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('reset.perform') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email" value="{{ old('email') }}" aria-label="Email">
                                            @error('email')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Enviar enlace</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="alert">
                                @include('components.alert')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
