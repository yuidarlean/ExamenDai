<?php
require '../dao/AnalisisMuestrasDAO.class.php';

if ($_SERVER['REQUEST_METHOD']=='GET'){
    echo json_encode(ObtenerResAnalisis());
}else{
    echo "Request method incorrecto";
}

function ObtenerResAnalisis(){
    $t = new AnalisisMuestrasDAO();
    
    $u = new Usuario(null, null, null, null, null, new TipoUsuario(null, null), null);
    $receptor = new Usuario(null, null, null, null, null, new TipoUsuario(null, null), null);
    
    if(isset($_GET["estado"])){ 
        $detalle->setEstado($_GET["estado"]);
    }
    
    if(isset($_GET["clienteId"]) && $_GET["clienteId"] != null){
        $u->setCodigoUsuario($_GET["clienteId"]);
    }
    
    if(isset($_GET["tecLabo"]) && $_GET["tecLabo"] != null){
        $detalle->setIdTecLab($_GET["tecLabo"]);
    }
    
    if(isset($_GET["clienteRut"]) && $_GET["clienteRut"] != null){
        $u->setRutUsuario($_GET["clienteRut"]);
    }
    
    if(isset($_GET["clienteNombre"]) && $_GET["clienteNombre"] != null){
        $u->setNombreUsuario($_GET["clienteNombre"]);
    }
    
    
    $detalle =  new AnalisisMuestras(null, null, null, null, null, $u, $receptor, null); 
    
    if(isset($_GET["codigoMuestra"]) && $_GET["codigoMuestra"] != null){
        $detalle->setCodigomuestra($_GET["codigoMuestra"]); 
    }
    
    $arr = $t->Obtener($detalle);
    
    //print_r($arr); 
    
    $lista = array();
    for ($i = 0; $i<count($arr); $i++){
        //print_r($arr[$i]);
        
        $a = array( 
            "idanalisismuestras" => $arr[$i]->getIdanalisismuestras(),
            "codigomuestra" => $arr[$i]->getCodigomuestra(), 
            "fecharecepcion" => $arr[$i]->getFecharecepcion(),
            "temperaturamuestra" => $arr[$i]->getTemperaturamuestra(),
            "cantidadmuestra" => $arr[$i]->getCantidadmuestra(),
            "estado" => $arr[$i]->getEstado(),
            "cliente" => array(
                "codigoUsuario" => $arr[$i]->getCliente()->getCodigoUsuario(),
                "rutUsuario" => $arr[$i]->getCliente()->getRutUsuario(),
                "nombreUsuario" => $arr[$i]->getCliente()->getNombreUsuario()
            ),
            "receptor" => array(
                "codigoUsuario" => $arr[$i]->getReceptor()->getCodigoUsuario(),
                "rutUsuario" => $arr[$i]->getReceptor()->getRutUsuario(), 
                "nombreUsuario" => $arr[$i]->getReceptor()->getNombreUsuario()
            ),
            "listaResultado" => array()
        );
        
        for($y = 0; $y <count($arr[$i]->getListaResultados()); $y++){
            $arrRm = $arr[$i]->getListaResultados();
            $b = array(
                "tipoAnalisis"=> array(
                    "idtipoanalisis" => $arrRm[$y]->getTipoAnalisis()->getIdtipoanalisis(),
                    "nombre" => $arrRm[$y]->getTipoAnalisis()->getNombre()
                ),
                "fecharegistro" => $arrRm[$y]->getFecharegistro(),
                "ppm" => $arrRm[$y]->getPpm(),
                "getEmpleadoanalista" => array(
                   "codigoUsuario" => $arrRm[$y]->getEmpleadoanalista()->getCodigoUsuario(), 
                    "nombreUsuario" => $arrRm[$y]->getEmpleadoanalista()->getNombreUsuario() 
                )
            );
            
            array_push($a["listaResultado"] , $b);
        }
        
        array_push($lista, $a);
    }
    return array("resultado" => $lista); 
}