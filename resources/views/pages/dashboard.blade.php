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
                                        {{ $totalUsers }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fas fa-user-lg opacity-10" aria-hidden="true"></i>
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
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Administrador</p>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">{{ $totalAdmin }}</span>
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
                                        <span class="text-success text-sm font-weight-bolder">{{ $totalDocentes }}</span>
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
        <div class="row mt-6">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="pie-chart" class="chart-canvas" height="300px"></canvas>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <p class="font-weight-bold text-sm text-dark">
                           Boletas cargadas por Bimestre
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="bar-chart" class="chart-canvas" height="300px"></canvas>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <p class="font-weight-bold text-sm text-dark">
                           Boletas cargadas por cada mes
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        var ctx2 = document.getElementById("pie-chart").getContext("2d");
        var boletasPorBimestre = @json($boletasPorBimestre);
        var labels = boletasPorBimestre.map(item =>item.bimestres);
        var data = boletasPorBimestre.map(item => item.cantidad);

        new Chart(ctx2, {
            type: "pie",
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        '#319309',
                        'orange',
                        'yellow',
                        'green',
                    ],
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        fontColor: 'black',
                        fontSize: 12,
                    },
                },
            },
        });
    </script>

    <script>
        var ctx = document.getElementById("bar-chart").getContext("2d");

        var meses = @json($boletasPorMes->pluck('mes'));
        var cantidades = @json($boletasPorMes->pluck('cantidad'));

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: meses,
                datasets: [{
                    label: "Boletas de notas",
                    data: cantidades,
                    backgroundColor: [
                        'red',
                        'orange',
                        'yellow',
                        'green',
                        'blue',
                        'purple',
                        'pink',
                        'brown',
                        'gray',
                        'black'
                    ],
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        fontColor: 'black',
                        fontSize: 12,
                    },
                },
            },
        });
    </script>
@endpush
