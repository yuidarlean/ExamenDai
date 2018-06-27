<?php

Class ResultadoAnalisis{
    private $idtipoanalisis;
    private $idanalisismuestras;
    private $fecharegistro;
    private $ppm;
    private $estado;
    private $rutempleadoanalista;
    
    public function __construct($idtipoanalisis,$idanalisismuestras,$fecharegistro,$ppm,$estado,$rutempleadoanalista) {
        $this->idtipoanalisis = $idtipoanalisis;
        $this->idanalisismuestras = $idanalisismuestras;
        $this->fecharegistro = $fecharegistro;
        $this->ppm = $ppm;
        $this->estado = $estado;
        $this->rutempleadoanalista = $rutempleadoanalista;
    }
    
    public function getIdtipoanalisis() {
        return $this->idtipoanalisis;
    }

    public function getIdanalisismuestras() {
        return $this->idanalisismuestras;
    }

    public function getFecharegistro() {
        return $this->fecharegistro;
    }

    public function getPpm() {
        return $this->ppm;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getRutempleadoanalista() {
        return $this->rutempleadoanalista;
    }

    public function setIdtipoanalisis($idtipoanalisis) {
        $this->idtipoanalisis = $idtipoanalisis;
    }

    public function setIdanalisismuestras($idanalisismuestras) {
        $this->idanalisismuestras = $idanalisismuestras;
    }

    public function setFecharegistro($fecharegistro) {
        $this->fecharegistro = $fecharegistro;
    }

    public function setPpm($ppm) {
        $this->ppm = $ppm;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setRutempleadoanalista($rutempleadoanalista) {
        $this->rutempleadoanalista = $rutempleadoanalista;
    }


            
}
