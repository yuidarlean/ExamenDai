<?php
include '../dao/UsuarioDAO.class.php';
include '../dao/ContactoDAO.class.php';


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
    $u = new Usuario(null, $_POST["rut"], null, null, null, new TipoUsuario(null, null), null); 
    $r1 = $usuarioDAO->ObtenerUsuario($u);
    
    if(count($r1) > 0){ 
        return array("resultado"=> "El rut ya se encuentra registrado en el sistema."); 
    } 
    
    $idEmpresa = $usuarioDAO->IngresarUsuario($empresa);
    
    $idContacto = 0;
    
    if($idEmpresa > 0){ 
        $usuario = new Usuario($idEmpresa, null, null, null, null, null, null);
        $contacto = new Contacto(null,$_POST["rutcontacto"], $_POST["nombrecontacto"], $_POST["emailcontacto"], $_POST["telefonocontacto"], $usuario );
        $contactoDAO = new ContactoDAO();

        $idContacto = $contactoDAO->IngresarContacto($contacto);
    }
    
    
    
    return array("resultado"=> array(
        "codigoEmpresa" => $idEmpresa,
        "codigoContacto" => $idContacto
                
    )); 
}


