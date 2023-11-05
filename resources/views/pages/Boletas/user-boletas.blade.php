@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Mis Boletas'])
    <div class="container-fluid py-6">
        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Boletas del estudiante</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            @foreach ($boletas as $boleta)
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">Estudiante: {{ $boleta->estudiante->Nombres }}
                                            {{ $boleta->estudiante->Apellidos }}</h6>
                                        <span class="mb-2 text-xs">Bimestre: <span
                                                class="text-dark font-weight-bold ms-sm-2">{{ $boleta->bimestre->descripcion }}</span></span>
                                        <span class="mb-2 text-xs">Docente: <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{ $boleta->profesor->Nombres }}
                                                {{ $boleta->profesor->Apellidos }}</span></span>
                                        <span class="text-xs">CODIGO: <span
                                                class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ asset('storage/boletas/' .$boleta->Boleta) }}"><i
                                                class="fa fa-download me-2" download></i>Download</a>

                                        <a class="btn btn-link text-dark px-3 mb-0"
                                            href="{{ asset('storage/boletas/' .$boleta->Boleta) }}">
                                            <i class="fas fa-file-pdf text-dark me-2" aria-hidden="true"></i> View
                                        </a>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0">Observaciones</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <i class="far fa-calendar-alt me-2"></i>
                                <small>23 - 26 OCT 2023</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-exclamation"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Mejorar en la puntualidad</h6>
                                        <span class="text-xs">26 Oct 2023, at 13:45 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                                    <i class="fa fa-comment me-2" aria-hidden="true"></i>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-exclamation"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Mejorar en el curso de comunicacion</h6>
                                        <span class="text-xs">26 Oct 2023, at 13:45 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                                    <i class="fa fa-comment me-2" aria-hidden="true"></i>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('layouts.footers.auth.footer') --}}
    </div>
@endsection
