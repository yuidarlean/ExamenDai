<?php
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'php/dao/UsuarioDAO.class.php';
     
    $usuarioDAO = new UsuarioDAO();
    $resultado =  $usuarioDAO->login($_POST["rut"], $_POST["clave"]);
    
    if($resultado == false){
        echo '<div class="row justify-content-md-center"><div class="col-3"><div class="alert alert-danger text-center" role="alert">Usuario o clave inválida</div></div></div>';
    }else{
        if ($resultado["estado"]==1){
            session_start();
            $_SESSION["usuario"] = $resultado;
            header("Location: bienvenido.php");            
        }else if($resultado["estado"]==2){
            echo '<div class="row justify-content-md-center"><div class="col-6"><div class="alert alert-warning text-center" role="alert">Su cuenta se encuentra bloqueada. Acerquese al bibliotecario para m&aacute;s informaci&oacute;n.</div></div></div>';
        } 
    }
    
 }
 include ('php/base/header.php');
 
 ?>
    
        <div class="main-panel full"> 
            
            <div class="content">
                <div class="container-fluid">
                    
                    <div class="row justify-content-center ">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header card-header-success">
                                    <h4>Ingreso</h4>
                                </div>
                                <div class="card-body">
                                    <form action="index.php" method="POST"> 
                                        
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Rut</label>
                                                    <input type="text" id="rut" name="rut" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12"> 
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Clave</label>
                                                    <input type="password" id="clave" name="clave" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <a href="registro.php" class="btn btn-secondary  ">¿No esta registrado? ingrese aquí</a>
                                        <button type="submit" class="btn btn-success pull-right">Ingresar</button>
                                        <div class="clearfix"></div>
                                    
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
