<?php
include '../dao/ParticularDAO.class.php';
include '../dao/TelefonoDAO.class.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    echo json_encode(particularNuevo());
}else{
    echo "request_method incorrecto";
}

function particularNuevo(){
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    $particular = new Particular(0, $_POST["rut"], $password, $_POST["nombre"], $_POST["direccion"], $_POST["email"]);
    
    $particularDAO = new ParticularDAO();
    $idParticular = $particularDAO->ingresar($particular);
    
    $telefono = new Telefono(0, $_POST["telefono"], $idParticular);
    $telefonoDAO = new TelefonoDAO();
    
    $resp = $telefonoDAO->ingresar($telefono);
    return array("resultado"=>$resp);
}
