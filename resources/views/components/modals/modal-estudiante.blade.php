<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos Personales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- FORMULARIO PARA ESTUDIANTE --}}
                <form role="form" id="formEstudiante" method="POST" enctype="multipart/form-data"
                    action="{{ route('estudiantes.register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">DNI</label>
                                <input class="form-control" type="text" name="dni" value="{{ old('dni') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nombres</label>
                                <input class="form-control" type="text" name="Nombres" value="{{ old('Nombres') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Apellidos</label>
                                <input class="form-control" type="text" name="Apellidos"
                                    value="{{ old('Apellidos') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Correo</label>
                                <input class="form-control" type="email" name="Correo" value="{{ old('Correo') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Telefono</label>
                                <input class="form-control" type="text" name="Telefono"
                                    value="{{ old('Telefono') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Fecha
                                    Nacimiento</label>
                                <input class="form-control" type="date" name="FechaNacimiento"
                                    value="{{ old('FechaNacimiento') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Direccion</label>
                                <input class="form-control" type="text" name="Direccion"
                                    value="{{ old('Direccion') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Bloque</label>
                                <select class="form-control form-control-sm" id="Bloque" name="Bloque"
                                    value="{{ old('Bloque') }}" required>
                                    <option  value="" disabled selected>Todas</option>
                                    @foreach ($bloques as $item)
                                        <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                                    @endforeach
                                </select >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Grado</label>
                                <select class="form-control form-control-sm" id="Grado" name="Grado"
                                    Value="{{ old('Grado') }}" required>
                                    <option  value="" disabled selected>Todas</option>
                                    @foreach ($grados as $item)
                                        <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                                    @endforeach
                                </select >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Seccion</label>
                                <select class="form-control form-control-sm" name="Seccion"
                                    value="{{ old('Seccion') }}" required>
                                    <option  value="" disabled selected>Todas</option>
                                    @foreach ($secciones as $item)
                                        <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer item-center">
                        <button type="button" class="btn bg-gradient-dark"
                            data-bs-dismiss="modal" onclick="ClearForm()">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </div>
                </form>

                {{-- javascript para vaciar los campos--}}
                 <script>
                    function ClearForm(){
                        var formulario = document.getElementById('formEstudiante')
                        formulario.reset();
                    }
                </script>
            </div>
        </div>
    </div>
</div>

{{-- modal update --}}
@foreach ($estudiantes as $estudiantes)
    <div class="modal fade " id="editModalEstudiante{{ $estudiantes->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal{{ $estudiantes->id }}Label">Editar datos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- FORMULARIO PARA ESTUDIANTE --}}
                    <form role="form" method="POST" enctype="multipart/form-data"
                        action="{{ route('estudiantes.update', $estudiantes->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">DNI</label>
                                    <input class="form-control" type="text" name="dni"
                                        value="{{ $estudiantes->dni }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nombres</label>
                                    <input class="form-control" type="text" name="Nombres"
                                        value="{{ $estudiantes->Nombres }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Apellidos</label>
                                    <input class="form-control" type="text" name="Apellidos"
                                        value="{{ $estudiantes->Apellidos }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Correo</label>
                                    <input class="form-control" type="email" name="Correo"
                                        value="{{ $estudiantes->Correo }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Telefono</label>
                                    <input class="form-control" type="text" name="Telefono"
                                        value="{{ $estudiantes->Telefono }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Fecha
                                        Nacimiento</label>
                                    <input class="form-control" type="date" name="FechaNacimiento"
                                        value="{{ $estudiantes->FechaNacimiento }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Direccion</label>
                                    <input class="form-control" type="text" name="Direccion"
                                        value="{{ $estudiantes->Direccion }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Bloque</label>
                                    <select class="form-control form-control-sm" id="Bloque" name="Bloque">
                                        @foreach ($bloques as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $estudiantes->Bloque ? 'selected' : '' }}>
                                                {{ $item->descripcion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Grado</label>
                                    <select class="form-control form-control-sm" id="Grado" name="Grado">
                                        @foreach ($grados as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $estudiantes->Grado ? 'selected' : '' }}>
                                                {{ $item->descripcion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Seccion</label>
                                    <select class="form-control form-control-sm" name="Seccion">
                                        @foreach ($secciones as $item)
                                            <option value="{{ $item->id }}"
                                                {{$item->id == $estudiantes->Seccion ? 'selected' : ''}}>
                                                {{ $item->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer item-center">
                            <button type="button" class="btn bg-gradient-dark"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{-- modal del perfil --}}

<div class="modal fade " id="ModalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perfil del docente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ....
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
