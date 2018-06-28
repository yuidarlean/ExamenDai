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
        $query = "insert into contacto (rutcontacto,nombrecontacto,emailcontacto,telefonocontacto,codigoempresa) values (?,?,?,?,?)";
        
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
            
            $codigoempresa = $data->getCodigoEmpresa();
            $preparedStatement->bindParam(5,$codigoempresa);
            
            $preparedStatement->execute();
            
            return 0;
        }else{
            throw new Exception ('no se pudo prepara la consulta a la base de datos: '.$this->conexion->$error);
        }
    }
}