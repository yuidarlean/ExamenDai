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
            $idTipo = $detalle->getIdTipoAnalisis();
            $preparedStatement->bindParam(1,$idTipo);
            
            $idAnalisis = $detalle->getIdAnalisisMuestras();
            $preparedStatement->bindParam(2,$idAnalisis);
            
            $preparedStatement->execute();
        }else{
            throw new Exception('no se pudo preparar la consulta: '.$this->conexion->error);
        }
    }
}

