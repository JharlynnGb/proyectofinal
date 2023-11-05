@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Inicio'])

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Chat bot</h6>
                </div>
                <div class="card-body p-3">
                    <!-- Botón para abrir el modal -->
                   
                </div>
            </div>
        </div>
    </div>

    <!-- Modal del chatbot -->
@endsection
