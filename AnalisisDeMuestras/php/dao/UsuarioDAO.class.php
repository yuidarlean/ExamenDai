<?php
include_once __DIR__. '/../conexion/DBConexion.class.php';
include_once __DIR__. '/../modelo/Usuario.class.php'; 

Class UsuarioDAO{
    
    private $conexion = null;
    
    public function __construct() {
        $this->conexion = DBConexion::getInstance()->getConexion();
    }
    
    public function ObtenerClientes($filtro){
        $query = "select codigoUsuario, rutUsuario, nombreUsuario, estado from usuario where (tipoUsuario=4 or tipoUsuario=5) and (UPPER(rutUsuario) LIKE UPPER(concat(?,'%')) or codigoUsuario = ?)";
        $preparedStatement = $this->conexion->prepare($query);
        if ($preparedStatement !== false){
            $preparedStatement->bindParam(1,$filtro);
            $preparedStatement->bindParam(2,$filtro);
                
            $preparedStatement->execute();
        }else{
            throw new Exception('No se pudo realizar la consulta '.$this->conexion->error);
        }
        $arUser = array();
        foreach($preparedStatement->fetchAll(PDO::FETCH_ASSOC) as $row){
            $u = new Usuario($row["codigoUsuario"], 
                    $row["rutUsuario"], 
                    0, 
                    $row["nombreUsuario"], 
                    0, 
                    0, $row["estado"]);
            array_push($arUser, $u);
        }
        return $arUser;
    }

    
    public function login($rut, $clave) {
        
        $query = " SELECT u.codigoUsuario, u.rutUsuario, u.passwordUsuario, u.nombreUsuario, u.direccionUsuario, u.tipoUsuario, "
                . " tu.nombresTipo, u.estado"
                . " FROM usuario u"
                . " LEFT JOIN tipousuario tu on tu.codigoTipo = u.tipoUsuario "
                . " where u.rutUsuario = ?";
        
        $respuesta = 0;
        $preparedStatement = $this->conexion->prepare($query);
        if ($preparedStatement !== false){
            $preparedStatement->bindParam(1,$rut);
            
            $preparedStatement->execute();
            foreach ($preparedStatement->fetchAll(PDO::FETCH_ASSOC) as $row){
            
                $arUser = array('id' => $row['codigoUsuario'],
                                'rut' => $row['rutUsuario'],
                                'nombre' => $row['nombreUsuario'],
                                'direccion' => $row['direccionUsuario'],
                                'tipo' => array( 
                                    'idTipo' => $row['tipoUsuario'],
                                    'descripcion' => $row['nombresTipo']
                                ),
                                'estado' => $row['estado']
                    );
                
                $password=$row["passwordUsuario"];  
                
                if (password_verify($clave, $password)){
                    return $arUser;
                }else{
                    return false; 
                } 
            }
        }else{
            throw new Exception ('no se pudo prepara la consulta a la base de datos: '.$this->conexion->$error);
        }
        return $respuesta;
    }




    /**
     * 
     * @param Usuario $data
     */
    public function IngresarUsuario($data){
        $query = "INSERT INTO usuario(codigoUsuario, rutUsuario, passwordUsuario, nombreUsuario, direccionUsuario, tipoUsuario, estado) "
                . "VALUES(null, ?, ?, ?, ?, ?, 1) ";
        $respuesta = 0;
        
        $preparedStatement = $this->conexion->prepare($query);
        if ($preparedStatement !== false){
            //$codigoUsuario = $data->getCodigoUsuario();
            $rutUsuario = $data->getRutUsuario();
            $preparedStatement->bindParam(1,$rutUsuario);
            
            $passwordUsuario = $data->getPasswordUsuario();
            $preparedStatement->bindParam(2,$passwordUsuario);
            
            $nombreUsuario = $data->getNombreUsuario();
            $preparedStatement->bindParam(3,$nombreUsuario);
            
            $direccionUsuario = $data->getDireccionUsuario();
            $preparedStatement->bindParam(4,$direccionUsuario);
            
            $tipoUsuario = $data->getTipoUsuario()->getCodigoTipo(); 
            $preparedStatement->bindParam(5,$tipoUsuario);
            
            $preparedStatement->execute();  
            
            $id = $this->conexion->lastInsertId(); 
            
            return $id;
            
        }else{
            throw new Exception ('no se pudo prepara la consulta a la base de datos: '.$this->conexion->$error);
        }
        return $respuesta; 
    }
    
}

