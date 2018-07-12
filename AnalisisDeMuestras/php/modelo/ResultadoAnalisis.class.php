<?php
require_once 'AnalisisMuestras.class.php';
require_once 'Usuario.class.php'; 
require_once 'TipoAnalisis.class.php';  

Class ResultadoAnalisis{
    
    private $idAnalisis;
    /**
     *
     * @var TipoAnalisis 
     */
    private $tipoAnalisis;
    
    private $fecharegistro;
    private $ppm;
    
    /**
     *
     * @var Usuario 
     */
    private $empleadoanalista;
    
    function __construct($idAnalisis, TipoAnalisis $tipoAnalisis, $fecharegistro, $ppm, Usuario $empleadoanalista) { 
        $this->idAnalisis = $idAnalisis;
        $this->tipoAnalisis = $tipoAnalisis;
        $this->fecharegistro = $fecharegistro;
        $this->ppm = $ppm;
        $this->empleadoanalista = $empleadoanalista;
    }
 
    function getIdAnalisis() {
        return $this->idAnalisis;
    }

    function getTipoAnalisis() {
        return $this->tipoAnalisis;
    }

    function getFecharegistro() {
        return $this->fecharegistro;
    }

    function getPpm() {
        return $this->ppm;
    }

    function getEmpleadoanalista() {
        return $this->empleadoanalista;
    }

    function setIdAnalisis($idAnalisis) {
        $this->idAnalisis = $idAnalisis;
    }

    function setTipoAnalisis(TipoAnalisis $tipoAnalisis) {
        $this->tipoAnalisis = $tipoAnalisis;
    }

    function setFecharegistro($fecharegistro) {
        $this->fecharegistro = $fecharegistro;
    }

    function setPpm($ppm) {
        $this->ppm = $ppm;
    }


    function setEmpleadoanalista(Usuario $empleadoanalista) {
        $this->empleadoanalista = $empleadoanalista;
    }



}



