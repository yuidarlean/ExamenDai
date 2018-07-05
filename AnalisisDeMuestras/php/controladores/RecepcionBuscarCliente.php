<?php
include '../dao/UsuarioDAO.class.php';

if ($_SERVER['REQUEST_METHOD']=='GET'){
    echo json_encode(ObtenerClientes($_GET["q"]));
}else{
    echo "request method incorrecto";
}

/**
 * 
 * @param type $filtro
 * @return array
 */
function ObtenerClientes($filtro){
    $c = new UsuarioDAO();
    $arr = $c->ObtenerClientes($filtro);
    
    $lista = array();
    for ($i = 0; $i<count($arr);$i++ ){
        array_push($lista, array(
            "codigoid"=>$arr[$i]->getCodigoUsuario(),
            "rut"=>$arr[$i]->getRutUsuario(),
            "nombre"=>$arr[$i]->getNombreUsuario(),
            "estado"=>$arr[$i]->getEstadoUsuario()
        ));
    }
    return $lista;
}