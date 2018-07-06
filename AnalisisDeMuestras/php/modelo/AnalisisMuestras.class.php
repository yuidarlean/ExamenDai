<?php
Class AnalisisMuestras{
    private $idanalisismuestras;
    private $codigomuestra;
    private $fecharecepcion;
    private $temperaturamuestra;
    private $cantidadmuestra;
    private $codigocliente;
    private $codigoreceptor;
    
    public function __construct($idanalisismuestras,$codigomuestra,$fecharecepcion,$temperaturamuestra,$cantidadmuestra,$codigocliente,$codigoreceptor) {
        $this->idanalisismuestras = $idanalisismuestras;
        $this->codigomuestra = $codigomuestra;
        $this->fecharecepcion = $fecharecepcion;
        $this->temperaturamuestra = $temperaturamuestra;
        $this->cantidadmuestra = $cantidadmuestra;
        $this->codigocliente = $codigocliente;
        $this->codigoreceptor = $codigoreceptor;
    }
    
    public function getIdanalisismuestras() {
        return $this->idanalisismuestras;
    }
    
    public function getCodigomuestra() {
        return $this->codigomuestra;
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

    public function getCodigocliente() {
        return $this->codigocliente;
    }

    public function getCodigoreceptor() {
        return $this->codigoreceptor;
    }

    public function setIdanalisismuestras($idanalisismuestras) {
        $this->idanalisismuestras = $idanalisismuestras;
    }
    
    public function setCodigomuestra($codigomuestra){
        $this->codigomuestra = $codigomuestra;
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

    public function setCodigocliente($codigocliente) {
        $this->codigocliente = $codigocliente;
    }

    public function setCodigoreceptor($codigoreceptor) {
        $this->codigoreceptor = $codigoreceptor;
    }

    
}
