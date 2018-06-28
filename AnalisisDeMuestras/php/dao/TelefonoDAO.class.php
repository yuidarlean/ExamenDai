<?php
include_once '../conexion/DBConexion.class.php';
include_once '../modelo/Telefono.class.php';

Class TelefonoDAO{
    private $conexion = null;
    
    public function __construct() {
        $this->conexion = DBConexion::getInstance()->getConexion();
    }
    
    
    /**
     * 
     * @param Telefono $data
     */
    public function ingresar($data){
        $query = "insert into telefono (numerotelefono, codigoParticular) values (?,?)";
        
        $preparedStatement = $this->conexion->prepare($query);
        if($preparedStatement !== false){
            $telefono = $data->getNumerotelefono();
            $preparedStatement->bindParam(1,$telefono);
            
            $codigoParticular = $data->getCodigoparticular();
            $preparedStatement->bindParam(2,$codigoParticular);
            
            $preparedStatement->execute();
            
            return 0;
        }else{
            throw new Exception('no se pudo prepara la consulta a la base de datos: '.$this->conexion->error);
        }
    }
}