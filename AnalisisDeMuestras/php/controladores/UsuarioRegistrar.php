<?php
include '../dao/UsuarioDAO.class.php'; 
include '../dao/ContactoDAO.class.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    echo json_encode(usuarioNuevo());
}else{
    echo "request_method incorrecto";
}

function usuarioNuevo(){
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    $tipo = new TipoUsuario($_POST["tipo"], null); 
    $usuario = new Usuario(null, $_POST["rut"], $password, $_POST["nombre"], $_POST["direccion"], $tipo, null);
    
    $usuarioDAO = new UsuarioDAO();
    $idUsuario = $usuarioDAO->IngresarUsuario($usuario); 
    
    return array("resultado"=> array( 
        "codigoUsuario" => $idUsuario
    ));
}

