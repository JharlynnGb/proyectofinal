<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl
        {{ str_contains(Request::url(), 'virtual-reality') == true ? ' mt-3 mx-3 bg-primary' : '' }}"
    id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pagina</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $title }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $title }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item px-3 d-flex align-items-center">

                </li>

                <li class="nav-item d-flex align-items-center">
                    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link text-white font-weight-bold px-0">
                            <i class="fas fa-sign-out-alt me-sm-1"></i>
                            <span class="d-sm-inline d-none">Cerrar Sesion</span>
                        </a>
                    </form>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center mt-3">
                    <button type="button" class="btn btn-link text-white" data-bs-toggle="modal"
                        data-bs-target="#chatModal">Soporte
                        <i class="fa fa-comment"></i> <!-- Icono de chat -->
                    </button>
                </li>

                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

{{-- modal chatbot --}}

<div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  position-fixed bottom-1 end-2 w-25" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chat bot</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="chatbox" style="height: 350px; overflow-y: scroll;">
                {{-- aqui van los mensajes --}}
            </div>
            <form action="/chatbot-interact" method="post" id="chatForm">
                @csrf
                <div class="card-footer text-muted d-flex justify-content-start align-items-center pe-2 pt-2 mt-3">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                        alt="avatar 3" style="width: 40px; height: 100%;">
                    <input type="text" name="message" id="message" class="form-control form-control-ms"
                        placeholder="Type message">
                    <button type="submit" class="btn btn-primary ms-2 mt-3 ms">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Función para agregar un mensaje al chatbox
        function addMessage(sender, message, timestamp, username) {
            var messageHTML = '<div class="d-flex justify-content-between">';
            messageHTML += '<p class="small mb-1 text-muted">' + timestamp + '</p>';
            messageHTML += '<p class="small mb-1">' + username + '</p>';
            messageHTML += '</div>';

            if (sender === 'user') {
                messageHTML += '<div class="d-flex flex-row justify-content-end mb-4 pt-2">';
            } else {
                messageHTML += '<div class="d-flex flex-row justify-content-start">';
            }

            messageHTML += '<div>';
            messageHTML += '<p class="small p-2 me-2 mb-2 text-white rounded-3 bg-' + (sender === 'user' ?
                'success' :
                'gradient-dark') + '">' + message + '</p>';
            messageHTML += '</div>';
            messageHTML += '</div>';

            $('#chatbox').append(messageHTML);
        }

        // Maneja el envío del formulario
        $('#chatForm').submit(function(e) {
            e.preventDefault();
            var username = "{{ auth()->user()->username ?? 'Username' }}"
            var userMessage = $('#message').val();
            var timestampMessage = new Date();
            var options = {
                year: '2-digit',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };
            var timestamp = timestampMessage.toLocaleString('en-US', options);

            if (userMessage.trim() === '') {
                // No permite enviar mensajes vacíos
                return;
            }

            // Agrega el mensaje del usuario al chatbox en el lado derecho
            addMessage('user', userMessage, timestamp, username);

            // Envía el mensaje al servidor (a través de AJAX, por ejemplo)
            $.ajax({
                type: 'POST',
                url: '/chatbot-interact', // Debes definir esta ruta en tus rutas de Laravel
                data: {
                    _token: $('input[name="_token"]').val(),
                    message: userMessage
                },
                success: function(response) {
                    // Agrega la respuesta del chatbot al chatbox en el lado izquierdo
                    addMessage('bot', response.message, 'Jamilet', timestamp);
                }
            });

            // Limpia el campo de entrada
            $('#message').val('');
        });
    });
</script>
