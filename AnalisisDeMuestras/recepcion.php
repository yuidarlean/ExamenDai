<?php
    include ('php/base/header.php');
?>
</head>
    <body>
        <?php
            include ('php/base/menu.php');
        ?>
        <div class="main-panel">
            <div class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand">Recepci&oacute;n de Muestras</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form">
                            <span class="bmd-form-group">
                                <div class="input-group no-border">
                                    <input type="text" value class="form-control" placeholder="Buscar...">
                                    <button type="button" class="btn btn-white btn-round btn-just-icon">
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content">
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
                                                    <label for="txtCodigoCliente" class="bmd-label-floating">C&oacute;digo Cliente:</label>
                                                    <input type="text" class="form-control" id="txtCodigoCliente" required>                                                    
                                                </div>
                                            </div>
                                            <div class="2">
                                                <button type="button" class="btn btn-primary btn-round btn-just-icon">
                                                    <i class="material-icons">search</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtRutCliente" class="bmd-label-floating">Rut Cliente:</label>
                                                    <input type="text" class="form-control" id="txtRutCliente" readonly="true">                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="txtNombreCliente" class="bmd-label-floating">Nombre Cliente:</label>
                                                    <input type="text" class="form-control" id="txtNombreCliente" readonly="true">                                                    
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtFechaRecepcion">Fecha de Recepci&oacute;n:</label>
                                                    <input type="date" id="txtFechaRecepcion" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtTemperatura">Temperatura de Muestra:</label>
                                                    <input type="text" id="txtTemperatura" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtCantidad">Cantidad de Muestra:</label>
                                                    <input type="text" id="txtCantidad" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="card card-nav-tabs">
                                                <div class="card-header card-header-">
                                                    <h5>An&aacute;lisis a realizar:</h5>
                                                </div>
                                                <div class="card-body">
                                                    Hola
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            <?php
             include ('php/base/footer.php');
            ?>                
        </div>        
    </body>
</html>
