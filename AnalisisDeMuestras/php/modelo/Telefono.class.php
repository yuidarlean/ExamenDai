<?php

Class Telefono{
    private $idtelefono;
    private $numerotelefono;
    private $codigoparticular;
    
    public function __construct($idtelefono,$numerotelefono,$codigoparticular) {
        $this->idtelefono = $idtelefono;
        $this->numerotelefono = $numerotelefono;
        $this->codigoparticular = $codigoparticular;
    }
    
    public function getIdtelefono() {
        return $this->idtelefono;
    }

    public function getNumerotelefono() {
        return $this->numerotelefono;
    }

    public function getCodigoparticular() {
        return $this->codigoparticular;
    }

    public function setIdtelefono($idtelefono) {
        $this->idtelefono = $idtelefono;
    }

    public function setNumerotelefono($numerotelefono) {
        $this->numerotelefono = $numerotelefono;
    }

    public function setCodigoparticular($codigoparticular) {
        $this->codigoparticular = $codigoparticular;
    }


}