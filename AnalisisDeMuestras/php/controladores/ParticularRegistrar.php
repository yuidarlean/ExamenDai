<?php
include '../dao/UsuarioDAO.class.php'; 
include '../dao/ContactoDAO.class.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    echo json_encode(particularNuevo());
}else{
    echo "request_method incorrecto";
}

function particularNuevo(){
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    $tipo = new TipoUsuario(4, null);
    $particular = new Usuario(null, $_POST["rut"], $password, $_POST["nombre"], $_POST["direccion"], $tipo, null);
    
    $usuarioDAO = new UsuarioDAO();
    
    $u = new Usuario(null, $_POST["rut"], null, null, null, new TipoUsuario(null, null), null); 
    $r1 = $usuarioDAO->ObtenerUsuario($u);
    
    if(count($r1) > 0){ 
        return array("resultado"=> "El rut ya se encuentra registrado en el sistema."); 
    } 
    
    $idParticular = $usuarioDAO->IngresarUsuario($particular); 
    
    $idContacto = 0;
    if($idParticular > 0){
        $usuario = new Usuario($idParticular, null, null, null, null, null, null);
        $contacto = new Contacto(null, null, null, null, $_POST["telefono"], $usuario ); 
        $contactoDAO = new ContactoDAO();

        $idContacto = $contactoDAO->IngresarContacto($contacto);
    }
    
    return array("resultado"=> array( 
        "codigoParticular" => $idParticular,
        "codigoContacto" => $idContacto
                
    ));
}
