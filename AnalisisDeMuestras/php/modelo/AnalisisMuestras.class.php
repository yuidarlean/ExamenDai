<?php
require_once 'Usuario.class.php';

Class AnalisisMuestras{
    private $idanalisismuestras;
    private $codigomuestra;
    private $fecharecepcion;
    private $temperaturamuestra;
    private $cantidadmuestra;
    /**
     *
     * @var Usuario 
     */
    private $cliente;
    
    /**
     *
     * @var Usuario 
     */
    private $receptor;
    
    private $listaResultados; 
    private $estado; 
    
    private $idTecLab; 
            
    
    function __construct($idanalisismuestras, $codigomuestra, $fecharecepcion, $temperaturamuestra, $cantidadmuestra, Usuario $cliente, Usuario $receptor,  $estado) {
        $this->idanalisismuestras = $idanalisismuestras; 
        $this->codigomuestra = $codigomuestra;
        $this->fecharecepcion = $fecharecepcion;
        $this->temperaturamuestra = $temperaturamuestra;
        $this->cantidadmuestra = $cantidadmuestra;
        $this->cliente = $cliente;
        $this->receptor = $receptor;
        $this->estado = $estado; 
        $this->idTecLab  = null;
    }

    function getIdanalisismuestras() {
        return $this->idanalisismuestras;
    }

    function getCodigomuestra() {
        return $this->codigomuestra;
    }

    function getFecharecepcion() {
        return $this->fecharecepcion;
    }

    function getTemperaturamuestra() {
        return $this->temperaturamuestra;
    }

    function getCantidadmuestra() {
        return $this->cantidadmuestra;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getReceptor() {
        return $this->receptor;
    }
    
    function getListaResultados() {
        return $this->listaResultados;
    }
    
    function getEstado() {
        return $this->estado;
    }
    
    function getIdTecLab() {
        return $this->idTecLab;
    }

    function setIdanalisismuestras($idanalisismuestras) {
        $this->idanalisismuestras = $idanalisismuestras;
    }

    function setCodigomuestra($codigomuestra) {
        $this->codigomuestra = $codigomuestra;
    }

    function setFecharecepcion($fecharecepcion) {
        $this->fecharecepcion = $fecharecepcion;
    }

    function setTemperaturamuestra($temperaturamuestra) {
        $this->temperaturamuestra = $temperaturamuestra;
    }

    function setCantidadmuestra($cantidadmuestra) {
        $this->cantidadmuestra = $cantidadmuestra;
    }

    function setCliente(Usuario $cliente) {
        $this->cliente = $cliente;
    }

    function setReceptor(Usuario $receptor) {
        $this->receptor = $receptor;
    }

    function setListaResultados($listaResultados) {  
        $this->listaResultados = $listaResultados;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setIdTecLab($idTecLab) {
        $this->idTecLab = $idTecLab;
    }

    
}
