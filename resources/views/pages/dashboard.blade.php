@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Inicio'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Usuarios</p>
                                    <p class="mb-0">
                                        {{$totalUsers}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fas fa-users-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Administradores</p>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">{{$totalAdmin}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="fas fa-user-lock text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class= "row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Docentes</p>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">{{$totalDocentes}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="fas fa-chalkboard-teacher text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Estudiantes</p>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">{{ $totalAlumnos }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="fas fa-user-graduate text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-5">
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <canvas id="pie-chart" class="chart-canvas" height="300px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Obtén los datos de estudiantes de primaria y secundaria desde PHP
        var estudiantesPrimaria = 100;
        var estudiantesSecundaria = 200;

        // Configura los datos del gráfico
        var data = {
            labels: ["Primaria", "Secundaria"],
            datasets: [{
                data: [estudiantesPrimaria, estudiantesSecundaria],
                backgroundColor: ["#36a2eb", "#ff6384"]
            }]
        };

        // Renderiza el gráfico de pastel
        var ctx = document.getElementById("pie-chart").getContext("2d");
        new Chart(ctx, {
            type: "pie",
            data: data,
            options: {
                responsive: true
            }
        });
    </script>
@endsection
