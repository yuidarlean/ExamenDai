<?php

Class Particular{
    private $codigoparticular;
    private $rutparticular;
    private $passwordparticular;
    private $nombreparticular;
    private $direccionparticular;
    private $emailparticular;
    
    public function __construct($codigoparticular,$rutparticular,$passwordparticular,$nombreparticular,$direccionparticular,$emailparticular) {
        $this->codigoparticular = $codigoparticular;
        $this->rutparticular = $rutparticular;
        $this->passwordparticular = $passwordparticular;
        $this->nombreparticular = $nombreparticular;
        $this->direccionparticular = $direccionparticular;
        $this->emailparticular = $emailparticular;
    }
    
    public function getCodigoparticular() {
        return $this->codigoparticular;
    }

    public function getRutparticular() {
        return $this->rutparticular;
    }

    public function getPasswordparticular() {
        return $this->passwordparticular;
    }

    public function getNombreparticular() {
        return $this->nombreparticular;
    }

    public function getDireccionparticular() {
        return $this->direccionparticular;
    }

    public function getEmailparticular() {
        return $this->emailparticular;
    }

    public function setCodigoparticular($codigoparticular) {
        $this->codigoparticular = $codigoparticular;
    }

    public function setRutparticular($rutparticular) {
        $this->rutparticular = $rutparticular;
    }

    public function setPasswordparticular($passwordparticular) {
        $this->passwordparticular = $passwordparticular;
    }

    public function setNombreparticular($nombreparticular) {
        $this->nombreparticular = $nombreparticular;
    }

    public function setDireccionparticular($direccionparticular) {
        $this->direccionparticular = $direccionparticular;
    }

    public function setEmailparticular($emailparticular) {
        $this->emailparticular = $emailparticular;
    }


}
