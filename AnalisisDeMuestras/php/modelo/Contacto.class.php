<?php
Class Contacto {
    private $rutcontacto;
    private $nombreContacto;
    private $emailContacto;
    private $telefonoContacto;
    private $codigoEmpresa;
    
    public function __construct($rutcontacto, $nombreContacto, $emailContacto, $telefonoContacto, $codigoEmpresa){
        $this->rutcontacto = $rutcontacto;
        $this->nombreContacto = $nombreContacto;
        $this->emailContacto = $emailContacto;
        $this->telefonoContacto = $telefonoContacto;
        $this->codigoEmpresa = $codigoEmpresa;
    }
    
    public function getRutcontacto() {
        return $this->rutcontacto;
    }

    public function getNombreContacto() {
        return $this->nombreContacto;
    }

    public function getEmailContacto() {
        return $this->emailContacto;
    }

    public function getTelefonoContacto() {
        return $this->telefonoContacto;
    }

    public function getCodigoEmpresa() {
        return $this->codigoEmpresa;
    }

    public function setRutcontacto($rutcontacto) {
        $this->rutcontacto = $rutcontacto;
    }

    public function setNombreContacto($nombreContacto) {
        $this->nombreContacto = $nombreContacto;
    }

    public function setEmailContacto($emailContacto) {
        $this->emailContacto = $emailContacto;
    }

    public function setTelefonoContacto($telefonoContacto) {
        $this->telefonoContacto = $telefonoContacto;
    }

    public function setCodigoEmpresa($codigoEmpresa) {
        $this->codigoEmpresa = $codigoEmpresa;
    }


    
    
}