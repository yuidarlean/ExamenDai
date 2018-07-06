<?php
include_once '../conexion/DBConexion.class.php';
include_once '../modelo/Contacto.class.php';

Class ContactoDAO{
    private $conexion = null;
    
    public function __construct() {
        $this->conexion = DBConexion::getInstance()->getConexion();
    }
    
    
    /**
     * 
     * @param Contacto $data
     */
    public function IngresarContacto($data){
        $query = "insert into contacto (rutcontacto, nombrecontacto, emailcontacto, telefonocontacto, codigousuario) values (?,?,?,?,?)";
        $respuesta = 0;
        
        $preparedStatement = $this->conexion->prepare($query);
        if ($preparedStatement !== false){
            $rutcontacto = $data->getRutcontacto();
            $preparedStatement->bindParam(1,$rutcontacto);
            
            $nombrecontacto = $data->getNombreContacto();
            $preparedStatement->bindParam(2,$nombrecontacto);
            
            $emailcontacto = $data->getEmailContacto();
            $preparedStatement->bindParam(3,$emailcontacto); 
             
            $telefonocontacto = $data->getTelefonoContacto();
            $preparedStatement->bindParam(4,$telefonocontacto); 
            
            $codigousuario = $data->getUsuario()->getCodigoUsuario();
            $preparedStatement->bindParam(5,$codigousuario);
            
            $preparedStatement->execute();
            
            $id = $this->conexion->lastInsertId(); 
            
            return $id;
        }else{
            throw new Exception ('no se pudo prepara la consulta a la base de datos: '.$this->conexion->$error);
        }
        return $respuesta;
    }
}