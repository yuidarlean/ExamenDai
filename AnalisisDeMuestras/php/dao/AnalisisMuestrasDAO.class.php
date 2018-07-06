<?php
include_once '../conexion/DBConexion.class.php';
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
        $query = "insert into analisismuestras (fechaRecepcion,temperaturaMuestra,cantidadMuestra,codigoUsuarioCliente,codigoUsuarioEmpleado) values (?,?,?,?,?)";
        
        $preparedStatement = $this->conexion->prepare($query);
        if($preparedStatement !== false){
            $fecha = $muestra->getFecharecepcion();
            $preparedStatement->bindParam(1,$fecha);
            
            $temperatura = $muestra->getTemperaturamuestra();
            $preparedStatement->bindParam(2,$temperatura);
            
            $cantidad = $muestra->getCantidadmuestra();
            $preparedStatement->bindParam(3,$cantidad);
            
            $cliente = $muestra->getCodigocliente();
            $preparedStatement->bindParam(4,$cliente);
            
            $receptor = $muestra->getCodigoreceptor();
            $preparedStatement->bindParam(5,$receptor);
            
            $preparedStatement->execute();
            
            $id = $this->conexion->lastInsertId();
            $codmuestra = sprintf("%03d",$muestra->getCodigocliente())."-".sprintf("%03d",$id);
            
            $resultado= array("id"=>$id,"codigomuestra"=>$codmuestra);
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
}


