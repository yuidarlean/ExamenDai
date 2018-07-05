<?php
include '../dao/UsuarioDAO.class.php';


if ($_SERVER['REQUEST_METHOD']=='POST'){
    echo json_encode(empresaNuevo());
}else{
    echo "request_method incorrecto";
}

function empresaNuevo(){
    
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
    
    $tipo = new TipoUsuario(5, null);
    
    $empresa = new Usuario(null, $_POST["rut"], $password, $_POST["nombre"], $_POST["direccion"], $tipo, null);
    //(0, $_POST["rut"], $_POST["nombre"], $password, $_POST["direccion"], 0);
    
    
    
    
    
    
    
    
    
    $usuarioDAO = new UsuarioDAO();
    $idEmpresa = $usuarioDAO->IngresarUsuario($empresa);
    
    /*if($idEmpresa){ 
        
    }
    
    $contacto = new Contacto($_POST["rutcontacto"], $_POST["nombrecontacto"], $_POST["emailcontacto"], $_POST["telefonocontacto"], $idEmpresa);
    $contactoDAO = new ContactoDAO();
    */
    //$resp = $contactoDAO->IngresarContacto($contacto);
    
    return array("resultado"=>$idEmpresa); 
}


