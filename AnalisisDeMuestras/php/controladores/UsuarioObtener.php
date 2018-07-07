<?php
include '../dao/UsuarioDAO.class.php'; 

if ($_SERVER['REQUEST_METHOD']=='GET'){
    echo json_encode(usuarioObtener());
}else{
    echo "request_method incorrecto";
}

function usuarioObtener(){
    
    $tipoUsuario = new TipoUsuario(null, null);
    $u = new Usuario(null, null, null, null, null, $tipoUsuario, null);
    
    $udao = new UsuarioDAO();
    
    $arr = $udao->ObtenerUsuario($u);
    $lista = [];
    
    for ($i = 0; $i<count($arr);$i++){
        array_push($lista, array(
           "codigoUsuario" => $arr[$i]->getCodigoUsuario(),
           "rutUsuario" => $arr[$i]->getRutUsuario(),
           "passwordUsuario" => '',
           "nombreUsuario" => $arr[$i]->getNombreUsuario(),
           "direccionUsuario" => $arr[$i]->getDireccionUsuario(),
           "tipoUsuario" => array(
               "codigoTipo" => $arr[$i]->getTipoUsuario()->getCodigoTipo(),
               "nombresTipo" => $arr[$i]->getTipoUsuario()->getNombresTipo(),
           ),
           "estado" => $arr[$i]->getEstadoUsuario()
            
        ));
    }
    
    return array("resultado" => $lista); 
}
