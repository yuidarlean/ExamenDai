<?php
include '../dao/UsuarioDAO.class.php'; 

if ($_SERVER['REQUEST_METHOD']=='PUT'){
    echo json_encode(usuarioDesactivar());
}else{
    echo "request_method incorrecto";
}

function usuarioDesactivar(){
    parse_str(file_get_contents("php://input"),$put);
    
    $tipo = new TipoUsuario(null, null); 
    $usuario = new Usuario($put["codigo"], null, null, null, null, $tipo, null);
    
    $usuarioDAO = new UsuarioDAO();
    $r = $usuarioDAO->DesactivarUsuario($usuario); 
    
    return array("resultado"=>$r );
}


