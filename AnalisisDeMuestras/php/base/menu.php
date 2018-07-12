<?php
    $usuario = null;
    
    if(isset($_SESSION["usuario"])){
        $usuario = $_SESSION["usuario"];
    }else{
        header("Location: index.php");
    }
    $idTipo = $_SESSION["usuario"]["tipo"]["idTipo"];
    $idTipoDes = $_SESSION["usuario"]["tipo"]["descripcion"];
    $nombre = $_SESSION["usuario"]["nombre"];
    $codigo = $_SESSION["usuario"]["id"];
    $rut = $_SESSION["usuario"]["rut"];
    $direccion = $_SESSION["usuario"]["direccion"];
?>

<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
            <a href="#" class="simple-text logo-normal">Men&uacute;</a>
        </div>
        <div class="sidebar-wrapper"> 
            <ul class="nav">
                <li class="nav-item" id="menu-bienvenido">
                    <a class="nav-link" href="bienvenido.php"> <i class="material-icons">home</i> <p>Inicio</p> </a>
            </li>
            <?php if($idTipo == 1 || $idTipo == 2){ ?>
            <li class="nav-item " id="menu-recepcion">
                <a class="nav-link" href="recepcion.php"> <i class="material-icons">assignment</i> <p>Recepción de muestra</p> </a>
            </li> 
            <?php }?>
            <?php if($idTipo == 1 || $idTipo == 3){ ?> 
            <li class="nav-item " id="menu-analizar"> 
                <a class="nav-link" href="analizar.php"><i class="material-icons">border_color</i> <p>Analizar</p>  </a>
            </li> 
            <?php }?>
            <?php if($idTipo == 1 ){ ?>
            <li class="nav-item " id="menu-usuario">
              <a class="nav-link" href="usuario.php"> <i class="material-icons">group</i> <p>Usuarios</p> </a> 
            </li>
            <?php }?>
            <?php if($idTipo == 1 ){ ?>
            <li class="nav-item " id="menu-cliente">
              <a class="nav-link" href="cliente.php"> <i class="material-icons">person</i> <p>Clientes</p> </a>
            </li>
            <?php }?>
            <li class="nav-item " >
                <a class="nav-link" href="index.php?action=logout">  <i class="material-icons">vpn_key</i> <p>Cerrar sesi&oacute;n</p> </a>
            </li>
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    <div class="main-panel"> 
        <div class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <p id="hUsuario" attr-codigo="<?=$codigo?>" attr-tipo="<?=$idTipo?>"> 
                            Bienvenido <?=$idTipoDes ?> : 
                            <a href="#" data-toggle="modal" data-target="#modalMisDatos"><?=$nombre ?> </a>
                        <?php if($idTipo == 4 || $idTipo == 5){ ?> 
                            (Su c&oacute;digo de cliente es: <?=$codigo ?>)
                        <?php } ?>
                    </div>
                        </p>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <!--<div class="collapse navbar-collapse justify-content-end">
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
                    </div>-->
                </div>
            </div>
            <div class="content"> 
