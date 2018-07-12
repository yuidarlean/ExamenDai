<?php
    include ('php/base/header.php');
    include ('php/base/menu.php');

    ?>
<script src="assets/js/usuario.js" type="text/javascript"></script>
        
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4>Usuarios ingresados</h4>
                                    <button class="btn btn-info btn-agregar" data-toggle="modal" data-target="#modalIngresarUsuario"><i class="material-icons"> group_add</i> </button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="tabla-usuario">
                                            <thead class="text-primary">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>rut</th>
                                                    <th>nombre</th>
                                                    <th>Tipo</th>
                                                    <th>Estado</th>
                                                    <th>Opci&oacute;n</th>
                                                </tr>
                                            </thead>
                                            <tbody class="grilla">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    
                    
                </div>
            


<!-- Modal -->
<div class="modal fade" id="modalIngresarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalIngresarUsuario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ingresar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <form id="formIngresoUsuarios">
                    <div class="form-group">
                        <div class="form-row"> 
                            <div class="col-md-12">
                                <div class="form-group"> 
                                    <label for="txtRut" class="bmd-label-floating">Rut:</label>
                                    <input type="text" maxlength="10" id="txtRut" name="txtRut" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtNombre" class="bmd-label-floating">Nombre:</label>
                                    <input type="text" maxlength="45" id="txtNombre" name="txtNombre" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtDireccion" class="bmd-label-floating">Direcci&oacute;n:</label>
                                    <input type="text" maxlength="45" id="txtDireccion" name="txtDireccion" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="selTipo" class="bmd-label-floating">Tipo de usuario:</label> 
                                    <select name="selTipo" id="selTipo" name="selTipo" class="form-control" required>
                                        <option value="">Seleccionar</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Receptor de muestras</option> 
                                        <option value="3">Técnico de laboratorio</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtClave1" class="bmd-label-floating">Contrase&ntilde;a:</label>
                                    <input type="password" id="txtClave1" name="txtClave1" class="form-control" maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtClave2" class="bmd-label-floating">Repetir contrase&ntilde;a:</label>
                                    <input type="password" id="txtClave2" name="txtClave2" class="form-control" maxlength="10" required> 
                                </div>
                            </div> 
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
                <button type="button" class="btn btn-success" id="btnGuardarUsuario">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalModificarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalModificarUsuario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modificar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <form id="formModificarUsuarios">
                    <div class="form-group">
                        <div class="form-row"> 
                            <div class="col-md-12">
                                <div class="form-group"> 
                                    <label for="txtRutM" class="">Rut:</label>
                                    <input type="hidden" maxlength="10" id="txtCodigoM" >
                                    <input type="text" maxlength="10" id="txtRutM" name="txtRutM" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtNombreM" class="">Nombre:</label>
                                    <input type="text" maxlength="45" id="txtNombreM" name="txtNombreM" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtDireccionM" class="">Direcci&oacute;n:</label>
                                    <input type="text" maxlength="45" id="txtDireccionM" name="txtDireccionM" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="selTipoM" class="">Tipo de usuario:</label> 
                                    <select name="selTipoM" id="selTipoM" name="selTipoM" class="form-control" required>
                                        <option value="">Seleccionar</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Receptor de muestras</option> 
                                        <option value="3">Técnico de laboratorio</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
                <button type="button" class="btn btn-success" id="btnModificarUsuario">Modificar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBloquearUsuario" tabindex="-1" role="dialog" aria-labelledby="btnBloquearUsuario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Desactivar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <p>El usuario sera bloqueado, quiere proceder?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
                <button type="button" class="btn btn-success" id="btnBloquearUsuario">Bloquear</button>
            </div>
        </div> 
    </div>
</div>

<div class="modal fade" id="modalActivarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalActivarUsuario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Desactivar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>El usuario sera activado, quiere proceder?</p>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
                <button type="button" class="btn btn-success" id="btnActivarUsuario">Activar</button>
            </div>
        </div>
    </div>
</div>

<?php
    include ('php/base/footer.php');
?>   
