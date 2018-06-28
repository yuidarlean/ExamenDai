<?php
include_once '../conexion/DBConexion.class.php';
include_once '../modelo/Empresa.class.php';

Class EmpresaDAO{
    private $conexion = null;
    
    public function __construct() {
        $this->conexion = DBConexion::getInstance()->getConexion();
    }
    
    /**
     * 
     * @param Empresa $data
     */
    public function ingresar($data){
        $query = "insert into empresa (rutempresa, nombreempresa,passwordempresa,direccionempresa) values (?,?,?,?)";
        
        $preparedStatement = $this->conexion->prepare($query);
        if($preparedStatement !== false){
            $rutempresa = $data->getRutempresa();
            $preparedStatement->bindParam(1,$rutempresa);
            
            $nombreempesa = $data->getNombrempesa();
            $preparedStatement->bindParam(2,$nombreempesa);
            
            $password = $data->getPasswordempresa();
            $preparedStatement->bindParam(3,$password);
            
            $direccionempresa= $data->getDireccionemprsa();
            $preparedStatement->bindParam(4,$direccionempresa);
            
            $preparedStatement->execute();
            
            $id = $this->conexion->lastInsertId();
            
            return $id;
        }else{
            throw new Exception('no se pudo preparar la consulta a la base de datos: '.$this->conexion->error);
        }
    }
}

