<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs fixed-start z-index-1" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none mr-2"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
            <img src="https://cdn-icons-png.flaticon.com/128/3655/3655598.png" class="navbar-brand-img h-100"
                alt="main_logo">
            <span class="font-weight-bold"> Alfonso Ugarte</span>
        </a>
    </div>
    <hr class="horizontal dark ">
    <div class="collapse navbar-collapse h-auto w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if (Auth::user()->rol === 'Admin' || Auth::user()->rol === 'Docente')
            <li class="nav-item ">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                    href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Inicio</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->rol === 'Admin' || Auth::user()->rol === 'Docente')
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'user-managment' ? 'active' : '' }}"
                        href="{{ route('user-managment') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-users text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() === 'estudiantes' }} ? 'active' : '' }}"
                        href="{{ route('estudiantes') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-graduate text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Estudiantes</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'docentes' ? 'active' : '' }}"
                    href="{{ route('docentes') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-chalkboard-teacher text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Docentes</span>
                </a>
            </li>
            @if (Auth::user()->rol === 'Estudiante')
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'user-boletas' ? 'active' : '' }}"
                        href="{{ route('my-boleta') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Mis Boletas</span>
                    </a>
                </li>
            @elseif(Auth::user()->rol === 'Docente' || Auth::user()->rol === 'Admin')
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'user-boletas' ? 'active' : '' }}"
                        href="{{ route('user-boletas') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Boletas</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}"
                    href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Perfil</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
