<?php
include_once '../conexion/DBConexion.class.php';
include_once '../modelo/ResultadoAnalisis.class.php';

Class ResultadoAnalisisDAO{
    
    private $conexion = null;
    
    public function __construct() {
        $this->conexion = DBConexion::getInstance()->getConexion();
    }
    
    /**
     * 
     * @param ResultadoAnalisis $detalle
     */
    public function AgregarDetalleMuestras($detalle){
        $query = "insert into resultadoanalisis (idTipoAnalisis, idAnalisisMuestras,estado) values (?,?,0)";
        
        $preparedStatement = $this->conexion->prepare($query);
        
        if ($preparedStatement !== false){
            $idTipo = $detalle->getTipoAnalisis()->getIdtipoanalisis();
            $preparedStatement->bindParam(1,$idTipo);
            
            $idAnalisis = $detalle->getIdAnalisis(); 
            $preparedStatement->bindParam(2,$idAnalisis);
            
            $preparedStatement->execute();
        }else{
            throw new Exception('no se pudo preparar la consulta: '.$this->conexion->error);
        }
    }
    
    /**
     * 
     * @param ResultadoAnalisis $detalle
     */
    public function actualizarDetalleMuestras($detalle) {
        $query = "update resultadoanalisis set PPM = ?, fechaRegistro = now(), estado= 2, codigoEmpleadoAnalista = ? "
                . " where idAnalisisMuestras = ?  and  idTipoAnalisis = ? ";
        
        $preparedStatement = $this->conexion->prepare($query);
        $ac = 0;
        if ($preparedStatement !== false){
            $ppm = $detalle->getPpm();
            $preparedStatement->bindParam(1, $ppm);
            
            $codEmpl = $detalle->getEmpleadoanalista()->getCodigoUsuario();
            $preparedStatement->bindParam(2, $codEmpl);
            
            $idAM = $detalle->getIdAnalisis();
            $preparedStatement->bindParam(3, $idAM);
            
            $idTA = $detalle->getTipoAnalisis()->getIdtipoanalisis();
            $preparedStatement->bindParam(4, $idTA); 
            
            $preparedStatement->execute();
            
            $c = $preparedStatement->rowCount(); 
            
            $ac = $c;
        }else{
            throw new Exception('no se pudo preparar la consulta: '.$this->conexion->error);
        }
        return $ac; 
    }
    
    /**
     * 
     * @param ResultadoAnalisis $detalle
     */
    public function Obtener($detalle){
        $query = "select ra.idAnalisisMuestras, ta.idTipoAnalisis, ta.nombre as 'nombreTipoAnalisis', "
                . " ra.fechaRegistro, ra.PPM,  " 
                . " ra.codigoEmpleadoAnalista as 'emplAnCodigo', empA.nombreUsuario as 'emplAnNombre'  "
                . " from resultadoanalisis ra "
                . " left join tipoanalisis ta on ra.idTipoAnalisis = ta.idTipoAnalisis "
                . " left join usuario empA on empA.codigoUsuario = ra.codigoEmpleadoAnalista "
                . " where "
                . " ra.idAnalisisMuestras = ?";
        
        $preparedStatement = $this->conexion->prepare($query);
        
        if ($preparedStatement !== false){
            $id = $detalle->getIdAnalisis(); 
            $preparedStatement->bindParam(1,$id); 
            
            $preparedStatement->execute();
            $arRA = array();
            
            foreach($preparedStatement->fetchAll(PDO::FETCH_ASSOC) as $row){
                
                $tipoAnalisis = new TipoAnalisis($row["idTipoAnalisis"], $row["nombreTipoAnalisis"]); 
                $empleadoanalista = new Usuario($row["emplAnCodigo"], null, null, $row["emplAnNombre"], '', null, null);  
                $ra = new ResultadoAnalisis($row["idAnalisisMuestras"], $tipoAnalisis, $row["fechaRegistro"], $row["PPM"], $empleadoanalista);
                array_push($arRA, $ra);
            }
            
            return $arRA;
            
        }else{
            throw new Exception('no se pudo preparar la consulta: '.$this->conexion->error);
        }
    
    }
    
    
    
}

