<?php
session_start();
include '../dao/AnalisisMuestrasDAO.class.php';
include '../dao/ResultadoAnalisisDAO.class.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    echo json_encode(IngresarMuestras());
}else{
    echo "request method incorrecto";
}

function IngresarMuestras(){
    $datosUsuario = $_SESSION["usuario"];
    
    $muestra = new AnalisisMuestras(0, 
            0, 
            $_POST["fecharecepcion"], 
            $_POST["temperaturamuestra"], 
            $_POST["cantidadmuestra"], 
            $_POST["codigocliente"], 
            $datosUsuario["id"]);
    
    $codigosanalisis = $_POST["codigomuestras"];
    
    $muestraDAO = new AnalisisMuestrasDAO();
    $datosmuestra=$muestraDAO->IngresarMuestra($muestra);
    $idRegistro = $datosmuestra["id"];
    $analisisresultadosDAO = new ResultadoAnalisisDAO();
    for($i=0;$i<count($codigosanalisis);$i++){
        $codanalisis = $codigosanalisis[$i];
        $analisisresultados = new ResultadoAnalisis($codanalisis, $idRegistro, 0, 0, 0, 0);
        $analisisresultadosDAO->AgregarDetalleMuestras($analisisresultados);
    }
    
    return array("resultado"=>$datosmuestra["codigomuestra"]);
    
    
    
}