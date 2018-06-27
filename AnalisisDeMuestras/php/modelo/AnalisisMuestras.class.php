<?php
Class AnalisisMuestras{
    private $idanalisismuestras;
    private $fecharecepcion;
    private $temperaturamuestra;
    private $cantidadmuestra;
    private $codigoempresa;
    private $codigoparticular;
    private $rutempleadorecibe;
    
    public function __construct($idanalisismuestras,$fecharecepcion,$temperaturamuestra,$cantidadmuestra,$codigoempresa,$codigoparticular,$rutempleadorecibe) {
        $this->idanalisismuestras = $idanalisismuestras;
        $this->fecharecepcion = $fecharecepcion;
        $this->temperaturamuestra = $temperaturamuestra;
        $this->cantidadmuestra = $cantidadmuestra;
        $this->codigoempresa = $codigoempresa;
        $this->codigoparticular = $codigoparticular;
        $this->rutempleadorecibe = $rutempleadorecibe;
    }
    
    public function getIdanalisismuestras() {
        return $this->idanalisismuestras;
    }

    public function getFecharecepcion() {
        return $this->fecharecepcion;
    }

    public function getTemperaturamuestra() {
        return $this->temperaturamuestra;
    }

    public function getCantidadmuestra() {
        return $this->cantidadmuestra;
    }

    public function getCodigoempresa() {
        return $this->codigoempresa;
    }

    public function getCodigoparticular() {
        return $this->codigoparticular;
    }

    public function getRutempleadoRecibe() {
        return $this->rutempleadorecibe;
    }

    public function setIdanalisismuestras($idanalisismuestras) {
        $this->idanalisismuestras = $idanalisismuestras;
    }

    public function setFecharecepcion($fecharecepcion) {
        $this->fecharecepcion = $fecharecepcion;
    }

    public function setTemperaturamuestra($temperaturamuestra) {
        $this->temperaturamuestra = $temperaturamuestra;
    }

    public function setCantidadmuestra($cantidadmuestra) {
        $this->cantidadmuestra = $cantidadmuestra;
    }

    public function setCodigoempresa($codigoempresa) {
        $this->codigoempresa = $codigoempresa;
    }

    public function setCodigoparticular($codigoparticular) {
        $this->codigoparticular = $codigoparticular;
    }

    public function setRutempleadoRecibe($rutempleadorecibe) {
        $this->rutempleadorecibe = $rutempleadorecibe;
    }


    
}
