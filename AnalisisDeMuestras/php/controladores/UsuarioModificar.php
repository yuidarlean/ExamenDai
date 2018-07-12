<?php
session_start();
include '../dao/UsuarioDAO.class.php'; 

if ($_SERVER['REQUEST_METHOD']=='PUT'){
    echo json_encode(usuarioModificar());
}else{
    echo "request_method incorrecto";
}

function usuarioModificar(){
    parse_str(file_get_contents("php://input"),$put);
    
    $tipo = new TipoUsuario(null, null); 
    
    if(isset($put["tipo"]) && $put["tipo"] != null){
        $tipo->setCodigoTipo($put["tipo"]);
    }
    
    
    $usuario = new Usuario($put["codigo"], $put["rut"], null, $put["nombres"], $put["direccion"], $tipo, null);
    
    $usuarioDAO = new UsuarioDAO();
    $cant = $usuarioDAO->ModificarUsuario($usuario); 
    
    if($cant > 0 && isset($put["actualizarsesion"]) && $put["actualizarsesion"] == 'si'){ 
       
       $_SESSION["usuario"]["nombre"] =  $put["nombres"];
       $_SESSION["usuario"]["rut"] = $put["rut"];
       $_SESSION["usuario"]["direccion"] = $put["direccion"];
    }
    return array("resultado"=> array( 
        "cant" => $cant
    ));
}

