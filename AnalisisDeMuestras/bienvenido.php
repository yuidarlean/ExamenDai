<?php
 include ('php/base/header.php');
 include ('php/base/menu.php');
?>
<script src="assets/js/bienvenido.js" type="text/javascript"></script>
<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4>Muestras</h4>
                    <p class="card-category">Muestras analizadas con sus resultados:</p>
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="col-md-5">
                                <div class="form-group bmd-form-group">
                                    <label for="txtBuscar" class="bmd-label-static">Buscar:</label> 
                                    <input type="text" class="form-control" id="txtBuscar" name="txtBuscar" placeholder="Cod Cliente / Rut Cliente / Nombre Cliente / Cod Muestra " >
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success btn-round btn-just-icon" id="btnBuscar"> 
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </div>
                            
                        
                    </div>
                    <div class="row">
                        <div class="table-responsive ml-2 ">
                            <table class="table" id="tabla-muestras">
                                <thead class="text-primary">
                                    <th>Rut Cliente</th>
                                    <th>Cliente</th> 
                                    <th>Código Muestra</th>
                                    <th>Fecha recepci&oacute;n</th>
                                    <th>Recepcionador</th>
                                    <th>Fecha analisis</th>
                                    <th>Técnico de laboratorio</th>
                                    <th>Estado</th>
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
</div>
                    
     

<!-- Modal -->
<div class="modal fade" id="modalRevisarAnalisis" tabindex="-1" role="dialog" aria-labelledby="modalRevisarAnalisis" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Revisar analisis muestra <label id="lblMuestra"></label> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                
                <div class="chart">
                    <div class="ct-chart ct-golden-section"> </div>
                </div>
                
                
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<?php
    include ('php/base/footer.php');
?>                
        