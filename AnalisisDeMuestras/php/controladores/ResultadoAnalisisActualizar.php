<?php
session_start();
require '../dao/AnalisisMuestrasDAO.class.php';  

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    echo json_encode(resultadoActualizar());
} else {
    echo "request_method incorreco";
}

function  resultadoActualizar(){
    parse_str(file_get_contents("php://input"),$put);
    
    $usuario = $_SESSION["usuario"];
    $idAnalisis = $put["data"]["idAnalisis"];
    
    $rDao = new ResultadoAnalisisDAO();
    $cant = 0;
    for ($i = 0; $i < count($put["data"]["resultados"]); $i++){
        $tipoAnalisis = new TipoAnalisis($put["data"]["resultados"][$i]["idtipoanalisis"], null);
        $ppm = $put["data"]["resultados"][$i]["ppm"];
        $empleadoanalista = new Usuario($usuario["id"], null, null, null, null, new TipoUsuario(null, null), null); 
        $r = new ResultadoAnalisis($idAnalisis, $tipoAnalisis, null, $ppm, $empleadoanalista);
        
        $res = $rDao->actualizarDetalleMuestras($r);
        if($res > 0){ 
            $cant++;
        }
    }
    $amres = 0;
    if($cant == count($put["data"]["resultados"])){
        $amDao = new AnalisisMuestrasDAO();
        $u = new Usuario(null, null, null, null, null, new TipoUsuario(null, null), null); 
        $am = new AnalisisMuestras($idAnalisis, null, null, null, null, $u, $u, 2);
        
        $amres = $amDao->cambiarEstado($am);
    }
    
    
    return array("resultado" => array(
        "cantRA" => $cant,
        "cantAM" => $amres 
    ));
}
