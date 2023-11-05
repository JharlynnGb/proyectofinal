  {{-- MODAL DE REGISTRO --}}
  @foreach($docente as $docente)
  <div class="modal fade " id="editModalDocente{{$docente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModal{{ $docente->id }}Label">Editar Docente</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">X</span>
                  </button>
              </div>
              <div class="modal-body">
                  {{-- fomulario para datos del docente --}}
                  <form role="form" method="POST" enctype="multipart/form-data"
                      action="{{ route('docentes.update',$docente->id) }}">
                      @csrf
                        @method ('PUT')
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="dni" class="form-control-label">DNI</label>
                                  <input class="form-control" type="text" name="dni" value="{{$docente->dni}}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="Nombres" class="form-control-label">Nombres</label>
                                  <input class="form-control" type="text" name="Nombres"
                                      value="{{ $docente->Nombres }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="Apellidos" class="form-control-label">Apellidos</label>
                                  <input class="form-control" type="text" name="Apellidos"
                                      value="{{$docente->Apellidos}}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="Correo" class="form-control-label">Correo</label>
                                  <input class="form-control" type="email" name="Correo" value="{{$docente->Correo}}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="Telefono" class="form-control-label">Telefono</label>
                                  <input class="form-control" type="text" name="Telefono"
                                      value="{{ $docente->Telefono }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="FechaNacimiento" class="form-control-label">Fecha
                                      Nacimiento</label>
                                  <input class="form-control" type="date" name="FechaNacimiento"
                                      value="{{ $docente->FechaNacimiento }}">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="Direccion" class="form-control-label">Direccion</label>
                                  <input class="form-control" type="text" name="Direccion"
                                      value="{{ $docente->Direccion }}">
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn bg-gradient-secondary"
                              data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">
                              <i class="fas fa-save"></i>
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
@endforeach