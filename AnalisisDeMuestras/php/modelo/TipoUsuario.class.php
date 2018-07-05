<?php

Class TipoUsuario{
    
    private $codigoTipo;
    private $nombresTipo;
    
    function __construct($codigoTipo, $nombresTipo) {
        $this->codigoTipo = $codigoTipo;
        $this->nombresTipo = $nombresTipo;
    }

    function getCodigoTipo() {
        return $this->codigoTipo;
    }

    function getNombresTipo() {
        return $this->nombresTipo;
    }

    function setCodigoTipo($codigoTipo) {
        $this->codigoTipo = $codigoTipo;
    }

    function setNombresTipo($nombresTipo) {
        $this->nombresTipo = $nombresTipo;
    }


}
