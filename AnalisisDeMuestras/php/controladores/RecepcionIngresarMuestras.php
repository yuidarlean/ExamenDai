<?php
session_start();
include '../dao/AnalisisMuestrasDAO.class.php';


if ($_SERVER['REQUEST_METHOD']=='POST'){
    echo json_encode(IngresarMuestras());
}else{
    echo "request method incorrecto";
}

function IngresarMuestras(){
    $datosUsuario = $_SESSION["usuario"];
     
    $tu = new TipoUsuario(null, null);
    $cliente = new Usuario($_POST["codigocliente"], null, null, null, null, $tu, null);
    $receptor = new Usuario($datosUsuario["id"], null, null, null, null, $tu, null);
    $muestra = new AnalisisMuestras(0, 0,  $_POST["fecharecepcion"], $_POST["temperaturamuestra"], $_POST["cantidadmuestra"], $cliente,  $receptor, null);
    
    $codigosanalisis = $_POST["codigomuestras"];
    
    $muestraDAO = new AnalisisMuestrasDAO();
    $datosmuestra=$muestraDAO->IngresarMuestra($muestra);
    $idRegistro = $datosmuestra["id"];
    
    $analisisresultadosDAO = new ResultadoAnalisisDAO();
    for($i=0;$i<count($codigosanalisis);$i++){
        $codanalisis = $codigosanalisis[$i];
        $u = new Usuario(null, null, null, null, null, $tu, null); 
        $tipoAnalisis =  new TipoAnalisis($codanalisis, null);
        $analisisresultados = new ResultadoAnalisis($idRegistro, $tipoAnalisis, null, null, $u); 
        
        $analisisresultadosDAO->AgregarDetalleMuestras($analisisresultados);
    }
    
    return array("resultado"=>$datosmuestra["codigomuestra"]);
    
    
    
}