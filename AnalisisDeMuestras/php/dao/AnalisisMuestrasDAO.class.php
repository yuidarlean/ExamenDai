<?php
include_once '../conexion/DBConexion.class.php';
include_once 'ResultadoAnalisisDAO.class.php';
include_once '../modelo/AnalisisMuestras.class.php';


Class AnalisisMuestrasDAO{
    
    private $conexion = null;
    
    public function __construct() {
        $this->conexion = DBConexion::getInstance()->getConexion();
    }
    
    /**
     * 
     * @param AnalisisMuestras $muestra
     */
    public function IngresarMuestra($muestra){ 
        //print_r($muestra);
        $query = "insert into analisismuestras (fechaRecepcion,temperaturaMuestra,cantidadMuestra,codigoUsuarioCliente,codigoUsuarioEmpleado) values (?,?,?,?,?)";
        
        $preparedStatement = $this->conexion->prepare($query);
        if($preparedStatement !== false){
            $fecha = $muestra->getFecharecepcion();
            $preparedStatement->bindParam(1,$fecha);
            
            $temperatura = $muestra->getTemperaturamuestra();
            $preparedStatement->bindParam(2,$temperatura);
            
            $cantidad = $muestra->getCantidadmuestra();
            $preparedStatement->bindParam(3,$cantidad);
            
            $cliente = $muestra->getCliente()->getCodigoUsuario();
            $preparedStatement->bindParam(4,$cliente);
            
            $receptor = $muestra->getReceptor()->getCodigoUsuario(); 
            $preparedStatement->bindParam(5,$receptor);
            
            $preparedStatement->execute();
            
            $id = $this->conexion->lastInsertId();
            $codmuestra = sprintf("%03d",$muestra->getCliente()->getCodigoUsuario())."-".sprintf("%03d",$id);  
            
            $resultado = array("id"=>$id,"codigomuestra"=>$codmuestra);
            $query = "update analisismuestras set codigomuestra=? where idAnalisisMuestras=?";
            $stmt = $this->conexion->prepare($query);
            if($stmt !== false){ 
                $stmt->bindParam(1,$codmuestra);
                $stmt->bindParam(2,$id);
                
                $stmt->execute();
                return $resultado;
            }else{
                throw new Exception('no se pudo preparar la consulta '.$this->conexion->error);
            }
        }else{
            throw new Exception('no se pudo preparar la consulta '.$this->conexion->error);
        }
    }
    
     
    /**
     * 
     * @param AnalisisMuestras $detalle
     */
    public function cambiarEstado($detalle) {
        $query = "update analisismuestras set estado = ? where idAnalisisMuestras = ? ";
        $cant = 0;
        
        $preparedStatement = $this->conexion->prepare($query);
        if($preparedStatement !== false){
            $estado = $detalle->getEstado();
            $preparedStatement->bindParam(1,$estado);
            
            $idAM = $detalle->getIdanalisismuestras(); 
            $preparedStatement->bindParam(2,$idAM); 
        
            $preparedStatement->execute();
            $cant =  $preparedStatement->rowCount();
        }else{
            throw new Exception('no se pudo preparar la consulta '.$this->conexion->error);
        } 
        return $cant;
    }
    
    /**
     * 
     * @param AnalisisMuestras $detalle
     */
    public function Obtener($detalle) {
        $query = " select "
                . " am.idAnalisisMuestras, am.fechaRecepcion, am.temperaturaMuestra, am.cantidadMuestra, am.codigomuestra, "
                . " am.codigoUsuarioCliente as 'entClienteCod', entr.rutUsuario as 'entClienteRut', entr.nombreUsuario as 'entClienteNombre', "
                . " am.codigoUsuarioEmpleado as 'recepEmplCod', repc.rutUsuario as 'recepEmplRut', repc.nombreUsuario as 'recepEmplNombre', "
                . " am.estado "
                . " from analisismuestras am "
                . " left join usuario entr on entr.codigoUsuario = am.codigoUsuarioCliente "
                . " left join usuario repc on repc.codigoUsuario = am.codigoUsuarioEmpleado ";
        
        $query2 =  "";
        
        if($detalle->getEstado() != null){
            $query2 .= "  am.estado = ?";
        }
        
        if($detalle->getCliente() != null && $detalle->getCliente()->getCodigoUsuario() != null){
            if(strlen($query2) > 0){ 
                $query2 .= " or "; 
            }
            $query2 .= "  entr.codigoUsuario like concat( ?, '%')";
        }
        
        if($detalle->getIdTecLab() != null){
            if(strlen($query2) > 0 ){
                $query2 .= " or ";
            }
            $query2 .=" (select count(ra.idAnalisisMuestras) from resultadoanalisis ra where ra.codigoEmpleadoAnalista = ? ) > 0 ";
        }
        
        if($detalle->getCliente() != null && $detalle->getCliente()->getRutUsuario() != null){
            if(strlen($query2) > 0){ 
                $query2 .= " or ";
            }
            $query2 .= "  entr.rutUsuario like concat(?, '%') ";
        }
        
        if($detalle->getCliente() != null && $detalle->getCliente()->getNombreUsuario() != null){
            if(strlen($query2) > 0){ 
                $query2 .= " or ";
            }
            $query2 .= "  entr.nombreUsuario like concat( ?, '%')";
        }
        
        if($detalle->getCodigomuestra() != null && $detalle->getCodigomuestra() != null){
            if(strlen($query2) > 0){ 
                $query2 .= " or ";
            }
            $query2 .= "  am.codigomuestra like concat( ?, '%')"; 
        }
        
        if(strlen($query2) > 0){
            $query .= " where ". $query2;
        }
        
        $query .= " order by am.idAnalisisMuestras desc ";
        
        $preparedStatement = $this->conexion->prepare($query);
        
        if ($preparedStatement !== false){
            $i = 1;
            if($detalle->getEstado() != null){
                $estado = $detalle->getEstado();
                $preparedStatement->bindParam($i++,$estado);  
            }
            
            if($detalle->getCliente() != null && $detalle->getCliente()->getCodigoUsuario() != null){
                $idCliente = $detalle->getCliente()->getCodigoUsuario(); 
                $preparedStatement->bindParam($i++, $idCliente);  
            }
                
            if($detalle->getIdTecLab() != null){
                $idTecLab = $detalle->getIdTecLab();  
                $preparedStatement->bindParam($i++, $idTecLab);  
            }
            if($detalle->getCliente() != null && $detalle->getCliente()->getRutUsuario() != null){
                $codigoC = $detalle->getCliente()->getCodigoUsuario();  
                $preparedStatement->bindParam($i++, $codigoC);  
            }
            
            if($detalle->getCliente() != null && $detalle->getCliente()->getNombreUsuario() != null){
                $nombre = $detalle->getCliente()->getNombreUsuario(); 
                $preparedStatement->bindParam($i++, $nombre);  
            }
            
            if($detalle->getCodigomuestra() != null && $detalle->getCodigomuestra() != null){
                $codMuestra = $detalle->getCodigomuestra(); 
                $preparedStatement->bindParam($i++, $codMuestra);
            }
            
            $preparedStatement->execute();
            
            $arRA = array();
            
            foreach($preparedStatement->fetchAll(PDO::FETCH_ASSOC) as $row){
                    
                    $cliEntr = new Usuario($row["entClienteCod"], $row["entClienteRut"], null, $row["entClienteNombre"], '', null, null); 
                    $receptor = new Usuario($row["recepEmplCod"], $row["recepEmplRut"], null, $row["recepEmplNombre"], '', null, null);  
                    $analisis = new AnalisisMuestras($row["idAnalisisMuestras"], $row["codigomuestra"], $row["fechaRecepcion"]
                            , $row["temperaturaMuestra"], $row["cantidadMuestra"], $cliEntr, $receptor, $row["estado"]); 

                    $rmDao = new ResultadoAnalisisDAO();
                    $u = new Usuario(null, null, null, null, null, new TipoUsuario(null, null), null); 
                    $rm = new ResultadoAnalisis($row["idAnalisisMuestras"], new TipoAnalisis(null, null), null, null, $u); 
                    $r = $rmDao->Obtener($rm); 
                    
                    $analisis->setListaResultados($r);
                    
                    array_push($arRA, $analisis);   
            }
            return $arRA;
        }else{
            throw new Exception('no se pudo preparar la consulta: '.$this->conexion->error);
        }
    }
    
    
    
}


