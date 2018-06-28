<?php
include_once '../conexion/DBConexion.class.php';
include_once '../modelo/Particular.class.php';

Class ParticularDAO{
    private $conexion = null;
    
    public function __construct(){
        $this->conexion = DBConexion::getInstance()->getConexion();
    }
    
    
    /**
     * 
     * @param Particular $data
     */
    public function ingresar($data){
        $query = "insert into particular (rutParticular,nombreParticular,passwordParticular,direccionParticular,emailParticular) values (?,?,?,?,?)";
        
        $preparedStatement = $this->conexion->prepare($query);
        
        if($preparedStatement !== false){
            $rut = $data->getRutparticular();
            $preparedStatement->bindParam(1,$rut);
            
            $nombre = $data->getNombreparticular();
            $preparedStatement->bindParam(2,$nombre);
            
            $password = $data->getPasswordparticular();
            $preparedStatement->bindParam(3,$password);
            
            $direccion = $data->getDireccionparticular();
            $preparedStatement->bindParam(4,$direccion);
            
            $email = $data->getEmailparticular();
            $preparedStatement->bindParam(5,$email);
            
            $preparedStatement->execute();
            
            $id = $this->conexion->lastInsertId();
            
            return $id;
        }else{
            throw new Exception('no se pudo preparar la consulta a la base de datos: '.$this->conexion->error);
        }
    }
}