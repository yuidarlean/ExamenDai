<?php
include '../dao/EmpresaDAO.class.php';
include '../dao/ContactoDAO.class.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    echo json_encode(empresaNuevo());
}else{
    echo "request_method incorrecto";
}

function empresaNuevo(){
    
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
    
    $empresa = new Empresa(0, $_POST["rut"], $_POST["nombre"], $password, $_POST["direccion"], 0);
    
    $empresaDAO = new EmpresaDAO();
    $idEmpresa = $empresaDAO->ingresar($empresa);
    
    $contacto = new Contacto($_POST["rutcontacto"], $_POST["nombrecontacto"], $_POST["emailcontacto"], $_POST["telefonocontacto"], $idEmpresa);
    $contactoDAO = new ContactoDAO();
    
    $resp = $contactoDAO->IngresarContacto($contacto);
    return array("resultado"=>$resp);
}


