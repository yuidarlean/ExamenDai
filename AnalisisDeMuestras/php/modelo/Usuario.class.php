<?php
include_once 'TipoUsuario.class.php'; 

class Usuario {
    private $codigoUsuario;
    private $rutUsuario;
    private $passwordUsuario;
    private $nombreUsuario;
    private $direccionUsuario;
    /**
     *
     * @var TipoUsuario 
     */
    private $tipoUsuario;
    private $estado;
    
    
    function __construct($codigoUsuario, $rutUsuario, $passwordUsuario, $nombreUsuario, $direccionUsuario, $tipoUsuario, $estado) {
        $this->codigoUsuario = $codigoUsuario;
        $this->rutUsuario = $rutUsuario;
        $this->passwordUsuario = $passwordUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->direccionUsuario = $direccionUsuario;
        $this->tipoUsuario = $tipoUsuario;
        $this->estado = $estado;
    }
    
    function getCodigoUsuario() {
        return $this->codigoUsuario;
    }

    function getRutUsuario() {
        return $this->rutUsuario;
    }

    function getPasswordUsuario() {
        return $this->passwordUsuario;
    }

    function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    function getDireccionUsuario() {
        return $this->direccionUsuario;
    }

    function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    function getEstadoUsuario() {
        return $this->estado;
    }

    function setCodigoUsuario($codigoUsuario) {
        $this->codigoUsuario = $codigoUsuario;
    }

    function setRutUsuario($rutUsuario) {
        $this->rutUsuario = $rutUsuario;
    }

    function setPasswordUsuario($passwordUsuario) {
        $this->passwordUsuario = $passwordUsuario;
    }

    function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    function setDireccionUsuario($direccionUsuario) {
        $this->direccionUsuario = $direccionUsuario;
    }

    function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

    function setEstadoUsuario($estado) {
        $this->estado = $estado;
    }

}