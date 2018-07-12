                </div> 
            <footer class="footer">
                <div class="container-fluid">
                  <nav class="float-left"> 
                    <?php
                        include 'footer-desa.php';
                    ?>  
                  </nav>
                </div>
              </footer>
            </div>  
            </div>
        </div>
        
        
<!-- Modal -->
<div class="modal fade" id="modalMisDatos" tabindex="-1" role="dialog" aria-labelledby="modalMisDatos" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mis Datos </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body"> 
                
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <form id="misDatosActualizar">
                                <div class="form-row"> 
                                    <div class="col-md-12">
                                        <h3>Cambiar mi información</h3>
                                    </div> 
                                    <div class="col-md-12 mt-5">
                                        <div class="form-group bmd-form-group"> 
                                            <label for="txtRutM" class="bmd-label-static">Rut:</label>
                                            <input type="text" maxlength="10" id="txtRutMD" name="txtRutMD" class="form-control" value="<?=$rut?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="form-group bmd-form-group">
                                            <label for="txtNombreMD" class="bmd-label-static">Nombre:</label>
                                            <input type="text" maxlength="45" id="txtNombreMD" name="txtNombreMD" class="form-control" value="<?=$nombre?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="form-group bmd-form-group">
                                            <label for="txtDireccionMD" class="bmd-label-static">Dirección:</label> 
                                            <input type="text" maxlength="45" id="txtDireccionMD" name="txtDireccionMD" class="form-control" value="<?=$direccion?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <button type="button" class="btn btn-success" id="btnConfirmarCambioMisDatos">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div> 
                        
                        <div class="col-md-5 ml-5">
                            <form id="misDatosClave">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h3>Cambiar clave</h3>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <div class="form-group bmd-form-group"> 
                                            <label for="txtNuevaClaveMD" class="bmd-label-static">Nueva Clave:</label>
                                            <input type="password" id="txtNuevaClaveMD" name="txtNuevaClaveMD" class="form-control" > 
                                        </div> 
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <div class="form-group bmd-form-group">  
                                            <label for="txtNuevaClaveRepetirMD" class="bmd-label-static">Repetir Clave:</label>
                                            <input type="password" id="txtNuevaClaveRepetirMD" name="txtNuevaClaveRepetirMD"  class="form-control">
                                        </div> 
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <button type="button" class="btn btn-success" id="btnGuardarClaveMD">Guardar Clave</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
            </div>
        </div>
    </div>
</div><!-- modalMisDatos --> 

<!-- Modal -->
<div class="modal fade" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="modalMensaje" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mensaje</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <p class="mensaje"></p>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div><!-- modalMensaje--> 

    </body>
</html>
