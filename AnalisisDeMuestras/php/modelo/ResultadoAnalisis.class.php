<?php
Class ResultadoAnalisis{
    private $idTipoAnalisis;
    private $idAnalisisMuestras;
    private $fecharegistro;
    private $ppm;
    private $estado;
    private $codigoempleadoanalista;
    
    public function __construct($idTipoAnalisis, $idAnalisisMuestras, $fecharegistro, $ppm, $estado, $codigoempleadoanalista) {
        $this->idTipoAnalisis = $idTipoAnalisis;
        $this->idAnalisisMuestras = $idAnalisisMuestras;
        $this->fecharegistro = $fecharegistro;
        $this->ppm = $ppm;
        $this->estado = $estado;
        $this->codigoempleadoanalista = $codigoempleadoanalista;
    }

    public function getIdTipoAnalisis() {
        return $this->idTipoAnalisis;
    }

    public function getIdAnalisisMuestras() {
        return $this->idAnalisisMuestras;
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

    public function getCodigoempleadoanalista() {
        return $this->codigoempleadoanalista;
    }

    public function setIdTipoAnalisis($idTipoAnalisis) {
        $this->idTipoAnalisis = $idTipoAnalisis;
    }

    public function setIdAnalisisMuestras($idAnalisisMuestras) {
        $this->idAnalisisMuestras = $idAnalisisMuestras;
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

    public function setCodigoempleadoanalista($codigoempleadoanalista) {
        $this->codigoempleadoanalista = $codigoempleadoanalista;
    }


}



