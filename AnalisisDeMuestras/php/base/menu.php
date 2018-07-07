<?php
    $usuario = null;
    
    if(isset($_SESSION["usuario"])){
        $usuario = $_SESSION["usuario"];
    }else{
        header("Location: index.php");
    }
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
            <li class="nav-item active " id="menu-inicio">
                <a class="nav-link" href="bienvenido.php"> 
                  <i class="material-icons">home</i>
                  <p>Inicio</p>
                </a>
            </li>
            <li class="nav-item " id="menu-recepcion">
                <a class="nav-link" href="recepcion.php">
                  <i class="material-icons">assignment</i>
                  <p>Recepción de muestra</p>
                </a>
            </li> 
            <li class="nav-item " id="menu-usuario">
              <a class="nav-link" href="usuario.php">
                <i class="material-icons">person</i>
                <p>Usuarios</p>
              </a>
            </li>
            <li class="nav-item " >
                <a class="nav-link" href="index.php?action=logout"> 
                  <i class="material-icons">vpn_key</i>
                  <p>Cerrar sesi&oacute;n</p>
                </a>
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

