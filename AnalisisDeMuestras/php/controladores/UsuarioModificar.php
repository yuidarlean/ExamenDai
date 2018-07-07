<?php
include '../dao/UsuarioDAO.class.php'; 

if ($_SERVER['REQUEST_METHOD']=='PUT'){
    echo json_encode(usuarioModificar());
}else{
    echo "request_method incorrecto";
}

function usuarioModificar(){
    parse_str(file_get_contents("php://input"),$put);
    
    $tipo = new TipoUsuario($put["tipo"], null); 
    $usuario = new Usuario($put["codigo"], $put["rut"], null, $put["nombre"], $put["direccion"], $tipo, null);
    
    $usuarioDAO = new UsuarioDAO();
    $idUsuario = $usuarioDAO->ModificarUsuario($usuario); 
    
    return array("resultado"=> array( 
        "codigoUsuario" => $idUsuario
    ));
}

