<?php

Class Empleado{
    private $rutempleado;
    private $nombrempleado;
    private $passwordempleado;
    private $categoria;
    
    public function __construct($rutempleado,$nombrempleado,$passwordempleado,$categoria) {
        $this->rutempleado = $rutempleado;
        $this->nombrempleado = $nombrempleado;
        $this->passwordempleado = $passwordempleado;
        $this->categoria = $categoria;
    }
    
    public function getRutempleado() {
        return $this->rutempleado;
    }

    public function getNombrempleado() {
        return $this->nombrempleado;
    }

    public function getPasswordempleado() {
        return $this->passwordempleado;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setRutempleado($rutempleado) {
        $this->rutempleado = $rutempleado;
    }

    public function setNombrempleado($nombrempleado) {
        $this->nombrempleado = $nombrempleado;
    }

    public function setPasswordempleado($passwordempleado) {
        $this->passwordempleado = $passwordempleado;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }


}
