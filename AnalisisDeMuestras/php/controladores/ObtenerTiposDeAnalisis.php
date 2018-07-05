<?php
require '../dao/TipoAnalisisDAO.class.php';

if ($_SERVER['REQUEST_METHOD']=='GET'){
    echo json_encode(ObtenerTipos());
}else{
    echo "Request method incorrecto";
}

function ObtenerTipos(){
    $t = new TipoAnalisisDAO();
    $arr = $t->ObtenerTipos();
    
    $tipos = array();
    for ($i = 0; $i<count($arr); $i++){
        array_push($tipos, array(
            "id"=>$arr[$i]->getIdtipoanalisis(),
            "nombre"=>$arr[$i]->getNombre()
        ));
    }
    return $tipos;
}
