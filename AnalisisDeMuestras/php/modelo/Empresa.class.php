<?php
Class Empresa{
    private $codigoempresa;
    private $rutempresa;
    private $nombrempesa;
    private $passwordempresa;
    private $direccionemprsa;
    private $contacto;
    
    public function __construct($codigoempresa,$rutempresa,$nombrempresa,$passwordempresa,$direccionempresa, $contacto) {
        $this->codigoempresa = $codigoempresa;
        $this->rutempresa = $rutempresa;
        $this->nombrempesa = $nombrempresa;
        $this->passwordempresa = $passwordempresa;
        $this->direccionemprsa = $direccionempresa;
        $this->contacto = $contacto;
    }
    
    public function getCodigoempresa() {
        return $this->codigoempresa;
    }

    public function getRutempresa() {
        return $this->rutempresa;
    }

    public function getNombrempesa() {
        return $this->nombrempesa;
    }

    public function getPasswordempresa() {
        return $this->passwordempresa;
    }

    public function getDireccionemprsa() {
        return $this->direccionemprsa;
    }
    
    public function getContacto() {
        return $this->contacto;
    }

    public function setCodigoempresa($codigoempresa) {
        $this->codigoempresa = $codigoempresa;
    }

    public function setRutempresa($rutempresa) {
        $this->rutempresa = $rutempresa;
    }

    public function setNombrempesa($nombrempesa) {
        $this->nombrempesa = $nombrempesa;
    }

    public function setPasswordempresa($passwordempresa) {
        $this->passwordempresa = $passwordempresa;
    }

    public function setDireccionemprsa($direccionemprsa) {
        $this->direccionemprsa = $direccionemprsa;
    }
    
    public function setContacto($contacto) {
        $this->contacto = $contacto;
    }


    
}
    
