<?php
include_once '../conexion/DBConexion.class.php';
include_once '../modelo/TipoAnalisis.class.php';

Class TipoAnalisisDAO{
    private $conexion = null;
    
    public function __construct() {
        $this->conexion = DBConexion::getInstance()->getConexion();
    }
    
    public function ObtenerTipos(){
        $arTipos = array();
        $query = "select idTipoAnalisis, nombre from tipoanalisis order by idTipoAnalisis";
        
        $preparedStatement = $this->conexion->prepare($query);
        
        if ($preparedStatement !== false){
            $preparedStatement->execute();
            
            foreach ($preparedStatement->fetchAll(PDO::FETCH_ASSOC) as $row){
                $tipos = new TipoAnalisis($row['idTipoAnalisis'], $row['nombre']);
                array_push($arTipos, $tipos);
            }
        }else{
            throw new Exception('No se pudo realizar la consulta '.$this->conexion->error);
        }
        return $arTipos;
    }
}