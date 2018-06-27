<?php

Class TipoAnalisis{
    private $idtipoanalisis;
    private $nombre;
    
    public function __construct($idtipoanalisis,$nombre) {
        $this->idtipoanalisis = $idtipoanalisis;
        $this->nombre = $nombre;
    }
    
    public function getIdtipoanalisis() {
        return $this->idtipoanalisis;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setIdtipoanalisis($idtipoanalisis) {
        $this->idtipoanalisis = $idtipoanalisis;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}