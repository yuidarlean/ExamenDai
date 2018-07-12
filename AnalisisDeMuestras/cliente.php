<?php
    include ('php/base/header.php');
    include ('php/base/menu.php');

    ?>
<script src="assets/js/cliente.js" type="text/javascript"></script>
        
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4>Clientes ingresados</h4>
                    
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
