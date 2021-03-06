<?php
    include ('php/base/header.php');
    include ('php/base/menu.php');
?>
<script src="assets/js/recepcion.js" type="text/javascript"></script>

         
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                                    <h4>Ingreso de muestras</h4>
                                    <p class="card-category">Complete el siguiente formulario para ingresar las muestras junto con los an&aacute;lisis que se realizar&aacute;n a ellas:</p>
                                </div>
                                <div class="card-body">
                                    <form id="frmNuevaMuestra" name="frmNuevaMuestra">
                                        <div class="form-row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtCodigoCliente">C&oacute;digo Cliente:</label>
                                                    <input type="text" class="form-control" id="txtCodigoCliente" name="txtCodigoCliente" required readonly>                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary btn-round btn-just-icon" data-toggle="modal" data-target="#modalBuscarCliente">
                                                        <i class="material-icons">search</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtRutCliente">Rut Cliente:</label>
                                                    <input type="text" class="form-control" id="txtRutCliente" name="txtRutCliente" readonly="true">                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="txtNombreCliente">Nombre Cliente:</label>
                                                    <input type="text" class="form-control" id="txtNombreCliente" name="txtNombreCliente" readonly="true">                                                    
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtFechaRecepcion">Fecha de Recepci&oacute;n:</label>
                                                    <input type="date" id="txtFechaRecepcion" class="form-control" name="txtFechaRecepcion">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtTemperatura">Temperatura de Muestra:</label>
                                                    <input type="text" id="txtTemperatura" class="form-control" name="txtTemperatura">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtCantidad">Cantidad de Muestra:</label>
                                                    <input type="text" id="txtCantidad" class="form-control" name="txtCantidad">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="card card-nav-tabs">
                                                <div class="card-header card-header-info">
                                                    <h4>An&aacute;lisis a realizar:</h4>
                                                    <p class="card-category">Seleccione los tipos de an&aacute;lisis que se realizar&aacute;n a las muestras:</p>
                                                </div>
                                                <div class="card-body" id="tiposanalisis">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <p id="mensajechecked" class="text-warning"></p>
                                        </div>
                                        <div class="form-row">
                                            <button type="button" id="btnRegistrar" class="btn btn-info">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
           
<!-- Modal -->
<div class="modal fade" id="modalBuscarCliente" tabindex="-1" role="dialog" aria-labelledby="modalBuscarCliente" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalBuscarCliente">Buscar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label for="txtBusqueda" class="bmd-label-static">C&oacute;digo/RUT</label>
                    <input type="text" class="form-control" id="txtBusqueda">
                </div>     
              </div>              
              <div class="col-md-2">
                  <div class="form-group">
                    <input type="button"class="btn btn-info" value="Buscar" id="btnBuscarCliente">                                        
                  </div>
              </div>
          </div>
          <div class="form-group">
              <table class="table" id="tablaClientes">
                  <thead>
                      <tr>
                          <th>C&oacute;digo cliente</th>
                          <th>Rut</th>
                          <th>Cliente/Empresa</th>
                          <th>Opci&oacute;n</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <td colspan="3"></td>
                      </tr>
                  </tfoot>
                  <tbody id="tabladatos">
                      
                  </tbody>
              </table>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarBuscarClientes">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Registro OK-->
<div class="modal fade" id="modalRegistroOK" tabindex="-1" role="dialog" aria-labelledby="modalRegistroOK" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="modalBuscarCliente">Recepci&oacute;n de muestras</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnRegistroOK">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<?php
    include ('php/base/footer.php');
?>