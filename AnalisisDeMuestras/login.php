<?php
    include ('php/base/header.php');
?>
</head>
<body style="margin-left: 25%; margin-top: 5%;">
        <div class="card card-nav-tabs" style="width: 50%;">
          <div class="card-header card-header-info">
            Solicitudes y An&aacute;lisis de Muestras - ISP
          </div>
          <div class="card-body">
              <h4 class="card-title">Iniciar sesi&oacute;n</h4>
              <p class="card-text">Ingrese sus credenciales para iniciar sesi&oacute;n en nuestro portal:</p>
              <form name="frmLogin" method="post" action="index.php">
                  <div class="form-group">
                      <label class="bmd-label-floating">Rut:</label>
                      <input class="form-control" id="txtRut">
                  </div>
                  <div class="form-group">
                      <label class="bmd-label-floating">Contrase&ntilde;a:</label>
                      <input type="password" class="form-control" id="txtClave">
                  </div>
                  
                  <a href="#" class="btn btn-info">Iniciar sesi&oacute;n</a>
                  
              </form>
          </div>
          <div class="card-footer">
              <a href="registro.php">Registrarse</a>
          </div>
        </div>    
    </body>
</html>
