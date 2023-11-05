  {{-- MODAL DE REGISTRO --}}
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
                  {{-- fomulario para datos del docente --}}
                  <form role="form" method="POST" enctype="multipart/form-data"
                      action="{{ route('docentes.register') }}">
                      @csrf
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="dni" class="form-control-label">DNI</label>
                                  <input class="form-control" type="text" name="dni" value="{{ old('dni') }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="Nombres" class="form-control-label">Nombres</label>
                                  <input class="form-control" type="text" name="Nombres"
                                      value="{{ old('Nombres') }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="Apellidos" class="form-control-label">Apellidos</label>
                                  <input class="form-control" type="text" name="Apellidos"
                                      value="{{ old('Apellidos') }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="Correo" class="form-control-label">Correo</label>
                                  <input class="form-control" type="email" name="Correo" value="{{ old('Correo') }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="Telefono" class="form-control-label">Telefono</label>
                                  <input class="form-control" type="text" name="Telefono"
                                      value="{{ old('Telefono') }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="FechaNacimiento" class="form-control-label">Fecha
                                      Nacimiento</label>
                                  <input class="form-control" type="date" name="FechaNacimiento"
                                      value="{{ old('FechaNacimiento') }}">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="Direccion" class="form-control-label">Direccion</label>
                                  <input class="form-control" type="text" name="Direccion"
                                      value="{{ old('Direccion') }}">
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
