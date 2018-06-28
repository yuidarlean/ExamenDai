<?php
    include('php/base/header.php');
?>
<script src="assets/js/registro_js.js" type="text/javascript"></script>
</head>
    <body style="margin-left: 15%; margin-top: 5%;">
        <div class="card card-nav-tabs" style="width: 75%;">
          <div class="card-header card-header-info">
            Formulario de Registro
          </div>
        <form id="frmRegistro">
          <div class="card-body">
              <h4 class="card-title">Nuevo cliente</h4>
              <p class="card-text">Complete el siguiente formulario para crear una nueva cuenta en nuestro sistema:</p>
                  <div class="form-row">
                      <div class="col-md-4">
                          <label for="opRadio">Tipo de Cliente:</label><br />
                          <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                            <input class="form-check-input" type="radio" id="opEmpresa" class="form-control" value="Empresa" name="opRadio"> Empresa
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                            </label>
                          </div>
                          <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                            <input class="form-check-input" type="radio" id="opParticular" class="form-control" value="Empresa" name="opRadio"> Particular
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                            </label>
                          </div>
                      </div>
                  </div>
                  <div class="form-row">                      
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="txtRut" class="bmd-label-floating">Rut:</label>
                            <input type="text" maxlength="10" id="txtRut" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="txtNombre" class="bmd-label-floating">Nombre:</label>
                            <input type="text" maxlength="45" id="txtNombre" class="form-control">
                          </div>
                      </div>
                      <div class="col-md">
                          <div class="form-group">
                              <label for="txtDireccion" class="bmd-label-floating">Direcci&oacute;n:</label>
                              <input type="text" maxlength="45" id="txtDireccion" class="form-control">
                          </div>
                      </div>
                  </div>
                  <div id="particular" style="display: none;">
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtEmail" class="bmd-label-floating">Email:</label>
                                <input type="email" maxlength="45" id="txtEmail" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtTelefono" class="bmd-label-floating">Tel&eacute;fono:</label>
                                <input type="text" class="form-control" id="txtTelefono" maxlength="15">
                                
                            </div>
                        </div>
                    </div>
                  </div>
                  <div id="empresa" style="display: none;">
                      <div class="form-row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="txtRutContacto" class="bmd-label-floating">Rut de Contacto:</label>
                                  <input type="text" class="form-control" id="txtRutContacto" maxlength="10">
                              </div>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="txtNombreContacto" class="bmd-label-floating">Nombre de Contacto:</label>
                                  <input type="text" id="txtNombreContacto" class="form-control" maxlength="30">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="txtEmailContacto" class="bmd-label-floating">Email de Contacto:</label>
                                  <input type="text" id="txtEmailContacto" class="form-control" maxlength="45">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="txtTelefonoContacto" class="bmd-label-floating">Tel&eacute;fono de Contacto:</label>
                                  <input type="text" id="txtTelefonoContacto" class="form-control" maxlength="15">
                              </div>
                          </div>
                      </div>
                  </div>
              <div class="form-row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="txtClave1" class="bmd-label-floating">Contrase&ntilde;a:</label>
                          <input type="password" id="txtClave1" class="form-control" maxlength="10">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="txtClave2" class="bmd-label-floating">Repetir contrase&ntilde;a:</label>
                          <input type="password" id="txtClave2" class="form-control" maxlength="10">
                      </div>
                  </div>
              </div>
          </div>
          <div class="card-footer">
              <input type="button" class="btn btn-success" value="Registrarse" id="btnRegistrar">
          </div>
         </form>
        </div>
        
<!-- Modal para mensajes -->    
<div class="modal fade" id="modalRegistroOK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Se ha registrado su cuenta correctamente. Haga click <a href="login.php">aqu&iacute;</a> para iniciar sesi&oacute;n.</p>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>        
    </body>
</html>
