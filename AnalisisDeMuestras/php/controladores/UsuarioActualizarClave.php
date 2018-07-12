<?php
session_start();
require '../dao/UsuarioDAO.class.php';  

if($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_SESSION["usuario"])) { 
    echo json_encode(usuarioActualizarClave());
} else {
    echo "request_method incorreco";
}

function usuarioActualizarClave(){
    parse_str(file_get_contents("php://input"),$put);
    $uDao = new UsuarioDAO();
    
    $codigoUsuario = $put["id"];
    $passwordUsuario = $put["clave"];
    
    $u = new Usuario($codigoUsuario, null, $passwordUsuario, null, null, new TipoUsuario(null, null), null);
    
    $r = $uDao->modificarClaveUsuario($u);
    
    return array("resultado" => $r); 
}