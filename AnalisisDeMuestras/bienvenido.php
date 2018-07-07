<?php
 include ('php/base/header.php');
?>
<!--     Fonts and icons     -->
        <?php
         include ('php/base/menu.php');
        ?>
        <div class="main-panel">
            <div class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand">Inicio</a>
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
                                    <h4>Muestras ingresadas</h4>
                                    <p class="card-category">Muestras ingresadas que est&aacute;n a la espera de ser recepcionadas:</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID Muestra</th>
                                                <th>Fecha recepci&oacute;n</th>
                                                <th>Temperatura de la muestra</th>
                                                <th>Cantidad</th>
                                                <th>Opci&oacute;n</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>27-06-2018</td>
                                                    <td>15°</td>
                                                    <td>5</td>
                                                    <td>Ver detalle</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4>Muestras pendientes</h4>
                                    <p class="card-category">Muestras recepcionadas que est&aacute;n a la espera de ser analizadas:</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID Muestra</th>
                                                <th>Fecha recepci&oacute;n</th>
                                                <th>Temperatura de la muestra</th>
                                                <th>Cantidad</th>
                                                <th>Opci&oacute;n</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>27-06-2018</td>
                                                    <td>15°</td>
                                                    <td>5</td>
                                                    <td>Ver detalle</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-success">
                                    <h4>Muestras analizadas</h4>
                                    <p class="card-category">Muestras analizadas con sus resultados:</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID Muestra</th>
                                                <th>Fecha recepci&oacute;n</th>
                                                <th>Temperatura de la muestra</th>
                                                <th>Cantidad</th>
                                                <th>Opci&oacute;n</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>27-06-2018</td>
                                                    <td>15°</td>
                                                    <td>5</td>
                                                    <td>Ver detalle</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
