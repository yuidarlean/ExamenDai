<?php
Class Empresa{
    private $codigoempresa;
    private $rutempresa;
    private $nombrempesa;
    private $passwordempresa;
    private $direccionemprsa;
    
    public function __construct($codigoempresa,$rutempresa,$nombrempresa,$passwordempresa,$direccionempresa) {
        $this->codigoempresa = $codigoempresa;
        $this->rutempresa = $rutempresa;
        $this->nombrempesa = $nombrempresa;
        $this->passwordempresa = $passwordempresa;
        $this->direccionemprsa = $direccionempresa;
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


    
}
    
