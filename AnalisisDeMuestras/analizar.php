<?php
    include ('php/base/header.php');
    include ('php/base/menu.php');

    ?>
<script src="assets/js/analizar.js" type="text/javascript"></script>
        
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4>Muestras pendientes</h4>
                    <p class="card-category">Muestras recepcionadas que est&aacute;n a la espera de ser analizadas:</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="tabla-muestras">
                            <thead class="text-primary">
                                <th>Código Muestra</th>
                                <th>Fecha recepci&oacute;n</th>
                                <th>Receptador</th>
                                <th>Temperatura de la muestra</th>
                                <th>Cantidad de muestra</th>
                                <th>Opci&oacute;n</th>
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
<div class="modal fade" id="modalRealizarAnalisis" tabindex="-1" role="dialog" aria-labelledby="modalRealizarAnalisis" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Realizar analisis muestra <label id="lblMuestra"></label> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label for="txtFechaRecepcionM" class="bmd-label-static">Fecha recepción:</label>
                            <input type="text" class="form-control" id="txtFechaRecepcionM" name="txtFechaRecepcionM" readonly="true">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label for="txtTemperaturaM" class="bmd-label-static">Temperatura de la muestra:</label>
                            <input type="text" class="form-control" id="txtTemperaturaM" name="txtTemperaturaM" readonly="true">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label for="txtCantidadM" class="bmd-label-static">Cantidad de muestra:</label>
                            <input type="text" class="form-control" id="txtCantidadM" name="txtCantidadM" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <table class="table" id="tabla-real-analisis">
                        <thead>
                            <tr>
                                <th>Tipo Analisis</th> 
                                <th>PPM</th>
                            </tr>
                        </thead>
                        <tbody class="grilla"> 
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
                <button type="button" class="btn btn-success" id="btnGuardarAnalisis">Guardar</button>
            </div>
        </div>
    </div>
</div>

<?php
    include ('php/base/footer.php');
?>   
