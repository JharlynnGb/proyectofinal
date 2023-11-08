@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Usuarios'])
    <div class="container-fluid py-6">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <form role="form-inline" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" id="rol" name="rol">
                                            <option value="0">rol</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" id="busqueda"
                                            name="busqueda" placeholder="Buscar...">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit"
                                            class="form-control form-control-sm btn btn-success btn-sm">BUSCAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive" style="max-height: 400px; overflow-y: Scroll;">
                            <table class="table align-items-center mb-0">
                                <thead class="fixed">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Datos</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Rol</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Estado</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Fecha reg</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="https://cdn-icons-png.flaticon.com/128/599/599305.png"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->username }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $item->correo }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->rol }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if (Auth::user()->estado === 1)
                                                    <span class="badge badge-sm bg-gradient-success">activo</span>
                                                @elseif(Auth::user()->estado === 2)
                                                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                            </td>
                                    
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
        {{-- @include('layouts.footers.auth.footer') --}}
    </div>
@endsection
