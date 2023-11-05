<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3">
            <h5 class="mb-0">Plujins</h5>
            <div class="d-flex flex-row align-items-center">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Barra Lateral</h6>
                <p class="text-sm">Elija entre 2 tipos diferentes de navegación lateral</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white"
                    onclick="sidebarType(this)">Blanco</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default"
                    onclick="sidebarType(this)">Oscuro</button>
            </div>
            <!-- <p class="text-sm d-xl-none d-block mt-2">Puedes modificar el tipo de navegación lateral solo en la visualización del escritorio.</p> -->
            <!-- Navbar Fixed -->
            <div class="d-flex my-3">
                <h6 class="mb-0">Barra de Navegación</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <div class="mt-2 mb-5 d-flex">
                <h6 class="mb-0">Claro / Oscuro</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                        onclick="darkMode(this)">
                </div>
            </div>
        </div>
    </div>

</div>
