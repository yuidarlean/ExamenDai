<?php
include_once 'Usuario.class.php'; 

Class Contacto {
    private $codigocontacto;
    private $rutcontacto;
    private $nombreContacto;
    private $emailContacto;
    private $telefonoContacto;
    /**
     *
     * @var Usuario 
     */
    private $usuario;
    
    function __construct($codigocontacto, $rutcontacto, $nombreContacto, $emailContacto, $telefonoContacto, Usuario $usuario) {
        $this->codigocontacto = $codigocontacto;
        $this->rutcontacto = $rutcontacto;
        $this->nombreContacto = $nombreContacto;
        $this->emailContacto = $emailContacto;
        $this->telefonoContacto = $telefonoContacto;
        $this->usuario = $usuario;
    }

    function getCodigocontacto() {
        return $this->codigocontacto;
    }

    function getRutcontacto() {
        return $this->rutcontacto;
    }

    function getNombreContacto() {
        return $this->nombreContacto;
    }

    function getEmailContacto() {
        return $this->emailContacto;
    }

    function getTelefonoContacto() {
        return $this->telefonoContacto;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setCodigocontacto($codigocontacto) {
        $this->codigocontacto = $codigocontacto;
    }

    function setRutcontacto($rutcontacto) {
        $this->rutcontacto = $rutcontacto;
    }

    function setNombreContacto($nombreContacto) {
        $this->nombreContacto = $nombreContacto;
    }

    function setEmailContacto($emailContacto) {
        $this->emailContacto = $emailContacto;
    }

    function setTelefonoContacto($telefonoContacto) {
        $this->telefonoContacto = $telefonoContacto;
    }

    function setUsuario(Usuario $usuario) {
        $this->usuario = $usuario;
    }


}